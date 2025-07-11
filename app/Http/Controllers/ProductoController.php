<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::paginate(10);
        return view("productos.index", compact("productos"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("productos.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $inventarioValidated = $request->validate([
            "nombre" => ["required", "string", "max:100"],
            "fecha_vco" => ["date"],
            "costo" => ["required", "numeric", "min:0"],
            "stock" => ["required", "integer", "min:0"],
        ]);
        $productoValidated = $request->validate([
            "Precio_venta" => ["required", "numeric", "min:0"],
            "Costo_produccion" => ["required", "numeric", "min:0"],
            "Porcentaje_utilidad" => ["required", "numeric", "min:0"],
            "photo" => ["image", "mimes:jpg,webp,png,jpeg,gif", "max:8096",],
        ]);

        try {
            DB::transaction(function () use ($request) {
                $inventario = Inventario::create([
                    "nombre" => $request->nombre,
                    "fecha_vco" => $request->fecha_vco,
                    "costo" => $request->costo,
                    "stock" => $request->stock,
                ]);


                // crear un nombre para la imagen que use la fecha y hora actual
                //dd($request->all());
                $nombre = time() . '.' . $request->photo->getClientOriginalExtension();
                if ($request->file('photo')) {
                    // $request->file('photo')->storeAs('fotos', $nombre, 'public');
                    try {
                        //Storage::disk('public')->makeDirectory('fotos');
                       // $guardado = Storage::disk('public')->putFileAs('fotos', $request->file('photo'), $nombre);
                        // if (!$guardado) {
                        //     throw new \Exception('Error al guardar la imagen en el disco');
                       // }
                        $request->file('photo')->move(public_path('fotos'), $nombre);
                        
            
                    } catch (\Exception $e) {
                        throw new \Exception('Error al subir la imagen: ' . $e->getMessage());
                    }
                } else {
                    $nombre = 'default.png'; // Nombre por defecto si no se sube una imagen
                }

                $producto = Producto::create([
                    "id" => $inventario->id,
                    "Precio_venta" => $request->Precio_venta,
                    "Costo_produccion" => $request->Costo_produccion,
                    "Porcentaje_utilidad" => $request->Porcentaje_utilidad,
                    "photo" => $nombre,
                ]);
            });

            return redirect()->route('inventarios.index')->with('success', 'Producto creado correctamente');
        } catch (\Exception $e) {
            return redirect()->back()->with('danger', 'Error: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $producto = Producto::findOrFail($id);
        return view('productos.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $producto = Producto::findOrFail($id);
        return view('productos.edit', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre' => 'required|max:100',
            'costo' => 'required|numeric|min:0',
            'fecha_vto' => 'date',
            'stock' => 'required|integer|min:0'
        ]);
        $request->validate([
            'Precio_venta' => 'required|numeric|min:0',
            'Costo_produccion' => 'required|numeric|min:0',
            'Porcentaje_utilidad' => 'required|numeric|min:0',
        ]);
        try {
            $producto = Producto::findOrFail($id);

            DB::transaction(function () use ($request, $producto) {
                $producto->inventarios->update([
                    'nombre' => $request->nombre,
                    'fecha_vco' => $request->fecha_vco,
                    'costo' => $request->costo,
                    'stock' => $request->stock
                ]);

                $producto->update([
                    "Precio_venta" => $request->Precio_venta,
                    "Costo_produccion" => $request->Costo_produccion,
                    "Porcentaje_utilidad" => $request->Porcentaje_utilidad,
                ]);
            });
            return redirect()->route('inventarios.index')->with('success', 'Producto actualizado correctamente');
        } catch (\Exception $e) {
            return redirect()->back()->with('danger', 'Error: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            DB::transaction(function () use ($id) {
                $producto = Producto::findOrFail($id);
                $producto->inventarios->delete(); // Elimina en cascada
            });

            return redirect()->route('inventarios.index')->with('success', 'Producto eliminado correctamente');
        } catch (\Exception $e) {
            return redirect()->back()->with('danger', 'Error: ' . $e->getMessage());
        }
    }
}
