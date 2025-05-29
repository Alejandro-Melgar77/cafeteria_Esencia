<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
use App\Models\User;
use App\Models\Usuario;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function formLogin()
    {
        return view("auth.login");
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        if (Auth::attempt($validated)) {

            $this->registrarBitacora("inicio de sesión");
            $request->session()->regenerate();
            return redirect()->route('dashboard')->with('success', 'Bienvenido!');
        }

        throw ValidationException::withMessages([
            'credentials' => 'Las credenciales proporcionadas no coinciden con nuestros registros',
        ]);
    }

    public function formRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'telefono' => 'required|string|max:15',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
        $user = User::create($validated);
        $usuario = Usuario::create([
            'Nombre' => $validated['name'],
            'Email' => $validated['email'],
            'Telefono' => $validated['telefono'],
            'RolID' => 3,
            'id_user' => $user->id
        ]);

        Auth::login($user);
        $this->registrarBitacora("Registro de usuario");
        $request->session()->flash('success', 'Registrado correctamente!');

        return redirect()->route('dashboard')->with('success', 'Bienvenido!');
    }

    public function logout(Request $request)
    {
        $this->registrarBitacora("Cerrado sesion");
        Auth::logout();
        $request->session()->flash('success', 'Cerrado sesión correctamente');
        // $request->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    public function registrarBitacora($accion)
    {
        $usuario = DB::table('usuarios')->where('id_user', Auth::user()->id)->first();
        Bitacora::create([
            'fecha' => now(),
            'hora' => Carbon::now(),
            'accion' => $accion,
            'codigoUsuario' => $usuario->id,
        ]);
    }
}
