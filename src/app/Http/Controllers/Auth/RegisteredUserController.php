<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Models\Rol;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        // Obtener todos los roles
        $rols = Rol::all();

    // Pasar los roles a la vista
        return view('auth.register', compact('rols'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nombre' => ['required', 'string', 'alpha',  'max:255'],
            'apellido_p' => ['required', 'string', 'alpha', 'max:255'],
            'apellido_m' => ['required', 'string', 'alpha', 'max:255'],
            'ci' => ['required', 'string','max:8', 'unique:'.User::class],
            'telefono' => ['required', 'string', 'max:10', 'unique:'.User::class],
            'usuario' => ['required', 'string', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'rol_id' => ['required', 'exists:rols,id']
        ]);

        $user = User::create([
            'nombre' => ucwords(strtolower($request->nombre)),
            'apellido_p' => ucwords(strtolower($request->apellido_p)),
            'apellido_m' => ucwords(strtolower($request->apellido_m)),
            'ci' => $request->ci,
            'telefono' => $request->telefono,
            'usuario' => $request->usuario,
            'password' => Hash::make($request->password),
            'rol_id' => $request->rol_id
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
