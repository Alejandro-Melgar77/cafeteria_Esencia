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
            return redirect()->route('welcome')->with('success', 'Bienvenido!');
        }

        throw ValidationException::withMessages([
            'credentials' => 'The provided credentials do not match our records.',
        ]);
    }

    public function formRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        //dd($request->all());
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
        $user = User::create($validated);
        $usuario = Usuario::create([
            'Nombre' => $validated['name'],
            'Email' => $validated['email'],
            'Telefono' => $request->input('telefono'),
            'RolID' => 1,
            'id_user' => $user->id
        ]);

        Auth::login($user);
        $this->registrarBitacora("Registro de usuario");
        $request->session()->flash('success', 'Registrado correctamente!');

        return redirect()->route('welcome');
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
        $usuario = DB::table('usuario')->where('id_user', Auth::user()->id)->first();
        Bitacora::create([
            'fecha' => now(),
            'hora' => Carbon::now(),
            'accion' => $accion,
            'codigoUsuario' => $usuario->id,
        ]);
    }
}
