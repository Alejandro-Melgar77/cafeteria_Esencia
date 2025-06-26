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

use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Str;

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
/**
     * Muestra el formulario para solicitar recuperación de contraseña
     */
    public function showLinkRequestForm()
    {
        return view('auth.forgot-password');
    }

    /**
     * Envía el enlace de recuperación al email
     */
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }

    /**
     * Muestra el formulario para restablecer la contraseña
     */
    public function showResetForm(Request $request, $token)
    {
        return view('auth.reset-password', [
            'token' => $token,
            'email' => $request->email
        ]);
    }

    /**
     * Procesa el restablecimiento de contraseña
     */
    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => $password
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
                Auth::login($user);
                $this->registrarBitacora("Contraseña restablecida");
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('dashboard')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }


    public function registrarBitacora($accion)
    {
        $usuario = DB::table('usuarios')->where('id_user', Auth::user()->id)->first();
        Bitacora::create([
            'fecha' => now(),
            'hora' => Carbon::now(),
            'accion' => $accion,
            'ip' => request()->ip(),
            'codigoUsuario' => $usuario->id,
        ]);
    }
    
    
}
