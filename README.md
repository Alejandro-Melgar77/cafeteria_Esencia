<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Instalación

Crear el .env desde la copia de .env.example

Instalar dependencias de composer y paquetes de node

```
composer install
npm install
```

Usar los siguiente comandos para crear la base de datos, desde las migraciones y el llenado de los datos iniciales.

```
php artisan migrate:fresh --seed --seeder=DatabaseSeeder
php key:generate
```

## Iniciar servidor local

Iniciar el servidor con el siguiente comando.

```
composer run dev
```

Nota: si el programa no se ejecuta, probar con

```
php artisan serve
```

Gracias :)
