<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest');
    }

    // Step 1: Show the first step registration form
    public function showStep1Form()
    {
        return view('auth.register_step1');
    }

    // Step 1: Process the first step registration form
    public function processStep1(Request $request)
    {
        $request->validate([
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'date_de_naissance' => ['nullable', 'date'],
            'genre' => ['required', 'string', 'in:Male,Female'], 
        ]);

        $userData = $request->only(['nom', 'prenom', 'date_de_naissance', 'genre']);

        $request->session()->put('step1_data', $userData);

        return redirect(route('register.step2'));
    }

    // Step 2: Show the second step registration form
    public function showStep2Form()
    {
        return view('auth.register_step2');
    }

    // Final step: Complete the registration
    protected function register(Request $request)
    {
        $request->validate([
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $step1Data = $request->session()->get('step1_data');
        $userData = array_merge($step1Data, $request->only(['username', 'email', 'password']));

        User::create([
            'email' => $userData['email'],
            'genre' => $userData['genre'],
            'password' => Hash::make($userData['password']),
            'nom' => $userData['nom'],
            'prenom' => $userData['prenom'],
            'date_de_naissance' => $userData['date_de_naissance'],
            'username' => $userData['username'],
        ]);

        $request->session()->forget('step1_data');

        return redirect(route('login'))->with('success', 'Registration completed successfully!');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'genre' => ['required', 'string', 'in:Male,Female'], 
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'genre' => $data['genre'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
