<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\NotaDeVenta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario; 

class FeedbackController extends Controller
{
    public function index()
    {
        // Obtener el usuario autenticado y su relación "usuario"
        $user = Auth::user();
        $usuario = $user->usuario;
        
        // Obtener las notas de venta del usuario con sus feedbacks
        $notasDeVenta = $usuario->notasDeVenta()
            ->with('feedback')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        
        return view('feedbacks.index', compact('notasDeVenta'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'nota_de_venta_id' => 'required|exists:notas_de_venta,id',
        ]);
        
        $notaDeVenta = NotaDeVenta::findOrFail($request->nota_de_venta_id);
        $usuarioId = Auth::user()->usuario->id;
        
        // Verificar que la nota de venta pertenece al usuario
        if ($notaDeVenta->usuario_id !== $usuarioId) {
            abort(403, 'No autorizado');
        }
        
        // Verificar que no existe feedback previo
        if ($notaDeVenta->feedback) {
            return redirect()->route('feedbacks.index')
                ->with('error', 'Ya existe un feedback para esta compra');
        }
        
        return view('feedbacks.create', compact('notaDeVenta'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'calificacion' => 'required|integer|min:1|max:5',
            'descripcion' => 'nullable|string|max:500',
            'nota_de_venta_id' => 'required|exists:notas_de_venta,id',
        ]);
        
        $notaDeVenta = NotaDeVenta::findOrFail($request->nota_de_venta_id);
        $usuarioId = Auth::user()->usuario->id;
        
        // Verificar que la nota de venta pertenece al usuario
        if ($notaDeVenta->usuario_id !== $usuarioId) {
            abort(403, 'No autorizado');
        }
        
        // Verificar que no existe feedback previo
        if ($notaDeVenta->feedback) {
            return redirect()->route('feedbacks.index')
                ->with('error', 'Ya existe un feedback para esta compra');
        }
        
        Feedback::create([
            'calificacion' => $request->calificacion,
            'descripcion' => $request->descripcion,
            'nota_de_venta_id' => $request->nota_de_venta_id,
        ]);
        
        return redirect()->route('feedbacks.index')
            ->with('success', '¡Feedback creado exitosamente!');
    }

    public function edit(Feedback $feedback)
    {
        $usuarioId = Auth::user()->usuario->id;
        
        // Verificar que el feedback pertenece al usuario
        if ($feedback->notaDeVenta->usuario_id !== $usuarioId) {
            abort(403, 'No autorizado');
        }
        
        return view('feedbacks.edit', compact('feedback'));
    }

    public function update(Request $request, Feedback $feedback)
    {
        $usuarioId = Auth::user()->usuario->id;
        
        // Verificar que el feedback pertenece al usuario
        if ($feedback->notaDeVenta->usuario_id !== $usuarioId) {
            abort(403, 'No autorizado');
        }
        
        $request->validate([
            'calificacion' => 'required|integer|min:1|max:5',
            'descripcion' => 'nullable|string|max:500',
        ]);
        
        $feedback->update([
            'calificacion' => $request->calificacion,
            'descripcion' => $request->descripcion,
        ]);
        
        return redirect()->route('feedbacks.index')
            ->with('success', '¡Feedback actualizado exitosamente!');
    }

    public function destroy(Feedback $feedback)
    {
        $usuarioId = Auth::user()->usuario->id;
        
        // Verificar que el feedback pertenece al usuario
        if ($feedback->notaDeVenta->usuario_id !== $usuarioId) {
            abort(403, 'No autorizado');
        }
        
        $feedback->delete();
        
        return redirect()->route('feedbacks.index')
            ->with('success', '¡Feedback eliminado exitosamente!');
    }
}