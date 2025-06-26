<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PayPalService
{
    protected $clientId;
    protected $clientSecret;
    protected $mode;
    protected $baseUrl;

    public function __construct()
    {
        $config = config('paypal');
        $this->mode = $config['mode'];
        $this->clientId = $config[$this->mode]['client_id'];
        $this->clientSecret = $config[$this->mode]['client_secret'];
        $this->baseUrl = $this->mode === 'sandbox' 
            ? 'https://api-m.sandbox.paypal.com' 
            : 'https://api-m.paypal.com';
    }

    public function createOrder($amount, $items)
    {
        try {
            // 1. Obtener access token
            $accessToken = $this->getAccessToken();
            
            // 2. Crear orden
            $orderData = $this->buildOrderData($amount, $items);
            
            // 3. Enviar solicitud para crear orden
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $accessToken,
                'PayPal-Request-Id' => uniqid()
            ])->post($this->baseUrl . '/v2/checkout/orders', $orderData);

            if ($response->failed()) {
                Log::error('PayPal Order Error', [
                    'status' => $response->status(),
                    'body' => $response->body(),
                    'headers' => $response->headers()
                ]);
                throw new \Exception('Error al crear orden: ' . $response->body());
            }

            return $response->json();
            
        } catch (\Exception $e) {
            Log::error('PayPal Service Exception: ' . $e->getMessage());
            throw $e;
        }
    }

    private function getAccessToken()
    {
        $response = Http::withBasicAuth($this->clientId, $this->clientSecret)
            ->asForm()
            ->post($this->baseUrl . '/v1/oauth2/token', [
                'grant_type' => 'client_credentials'
            ]);

        if ($response->failed()) {
            Log::error('PayPal Token Error', [
                'status' => $response->status(),
                'body' => $response->body(),
                'headers' => $response->headers()
            ]);
            throw new \Exception('Error al obtener token: ' . $response->body());
        }

        return $response->json()['access_token'];
    }

    private function buildOrderData($amount, $items)
    {
        return [
            "intent" => "CAPTURE",
            "purchase_units" => [[
                "amount" => [
                    "currency_code" => config('paypal.currency', 'USD'),
                    "value" => number_format($amount, 2),
                    "breakdown" => [
                        "item_total" => [
                            "currency_code" => config('paypal.currency', 'USD'),
                            "value" => number_format($amount, 2)
                        ]
                    ]
                ],
                "items" => array_map(function($item) {
                    return [
                        "name" => substr($item['nombre'], 0, 127),
                        "unit_amount" => [
                            "currency_code" => config('paypal.currency', 'USD'),
                            "value" => number_format($item['precio'], 2)
                        ],
                        "quantity" => $item['cantidad'],
                        "sku" => "item-".$item['id']
                    ];
                }, $items)
            ]],
            "application_context" => [
                "return_url" => url(config('paypal.return_url')),
                "cancel_url" => url(config('paypal.cancel_url'))
            ]
        ];
    }
}