<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

    

    public function create($id)
{
    $utilisateur = User::find($id);

    if (!$utilisateur) {
        return redirect()->back()->with('error', 'Utilisateur non trouvé.');
    }

    $profile = $utilisateur->profile;

    $photoPath = $profile ? asset("storage/{$profile->photo}") : asset('images/noprofil.png');

    return view('profiles.create', compact('utilisateur', 'profile', 'photoPath'));
}





    public function mettreAJourProfile(Request $request, $id)
{
    $request->validate([
        'nom' => 'required|string',
        'prenom' => 'required|string',
        'username' => 'required|string',
        'date_de_naissance' => 'required|date',
        'adresse' => 'nullable|string',
        'mobile' => 'nullable|string',
    ]);

    $utilisateur = User::find($id);

    if (!$utilisateur) {
        return redirect()->back()->with('error', 'Utilisateur non trouvé.');
    }

    $utilisateur->update([
        'nom' => $request->input('nom'),
        'prenom' => $request->input('prenom'),
        'username' => $request->input('username'),
        'date_de_naissance' => $request->input('date_de_naissance'),
        'adresse' => $request->input('adresse'),
        'mobile' => $request->input('mobile'),
        'sexe' => $request->input('sexe'),
    ]);

    $profile = $utilisateur->profile ?? new Profile();
    $profile->bio = $request->input('bio');

    $profile->utilisateur_id = $utilisateur->id;

    if ($request->hasFile('photo')) {
        $photoPath = $request->file('photo')->store('photos', 'public');
        $profile->photo = $photoPath;


}
$profile->save();

    return redirect()->route('profile', ['id' => $id])->with('success', 'Profil mis à jour avec succès.');
}



    public function showDashboard()
    {
        $utilisateur = auth()->user(); 

        if ($utilisateur) {
            $profile = $utilisateur->profile;

            if ($profile) {
                
                return view('dashboard', compact('utilisateur', 'profile'));
            } else {
                
                return view('dashboard', compact('utilisateur'))->with('warning', 'Aucun profil trouvé.');
            }
        } else {
           
            return redirect()->route('login');
        }
    }





public function showProfile()
{
    $utilisateur = auth()->user();
    $user = Auth::user();

        $photoPath = $user->profile && $user->profile->photo
            ? 'storage/' . $user->profile->photo
            : asset("images/noprofil.png");

    if ($utilisateur) {
        $profile = $utilisateur->profile;

        
        return $profile
            ? view('profile', compact('utilisateur', 'profile','user','photoPath'))
            : view('profile', compact('utilisateur','user','photoPath'));
    }

    return redirect()->route('login');
}



}
