<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Medecin;
use App\Models\Patient;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', 'string', 'in:admin,medecin,patient'], // Ajoutez la validation du rôle
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role, 
        ]);

        // Enregistrer dans la table spécifique selon le rôle
        if ($request->role === 'patient') {
            $request->validate([
                'dateNaissance' => ['required', 'date'],
                'genre' => ['required', 'string', 'max:255'],
                'adresse' => ['required', 'string', 'max:255'],
                'telephone' => ['required', 'string', 'max:20'],
                'numero_securite_sociale' => ['required', 'string', 'max:255'],
            ]);

            Patient::create([
                'user_id' => $user->id,
                'name' => $request->name,
                'dateNaissance' => $request->dateNaissance,
                'genre' => $request->genre,
                'adresse' => $request->adresse,
                'telephone' => $request->telephone,
                'email' => $request->email,
                'numero_securite_sociale' => $request->numero_securite_sociale,
            ]);
        } elseif ($request->role === 'medecin') {
            $request->validate([
                'specialite' => ['required', 'string', 'max:255'],
                'numero_licence' => ['required', 'string', 'max:255'],
                'telephone_medecin' => ['required', 'string', 'max:20'],
                'adresse_medecin' => ['required', 'string', 'max:255'],
                'date_embauche' => ['required', 'date'],
            ]);

            Medecin::create([
                'user_id' => $user->id,
                'name' => $request->name,
                'specialite' => $request->specialite,
                'numero_licence' => $request->numero_licence,
                'telephone' => $request->telephone_medecin,
                'email' => $request->email,
                'adresse' => $request->adresse_medecin,
                'date_embauche' => $request->date_embauche,
            ]);
        }

        event(new Registered($user));

        Auth::login($user);

        // Redirection en fonction du rôle de l'utilisateur
        if ($user->role === 'admin') {
            return redirect()->intended('/admin/dashboard');
        } elseif ($user->role === 'medecin') {
            return redirect()->intended('/medecin/dashboard');
        } elseif ($user->role === 'patient') {
            return redirect()->intended('/patient/dashboard');
        }

        return redirect(RouteServiceProvider::HOME);
    }
}
