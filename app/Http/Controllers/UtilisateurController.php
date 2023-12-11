<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Profile;

class UtilisateurController extends Controller
{
    public function index()
    {
        $utilisateurs = User::all();
        return view('affichage', compact('utilisateurs'));
    }


    public function listeUser()
    {
        $utilisateurs = User::all();
        return view('affichage', compact('utilisateurs'));
    }

    public function listeUtilisateur()
{
    $utilisateurs = User::all();
    return view('liste_utilisateurs', compact('utilisateurs'));
}


    public function modifierUser($id)
    {
        $utilisateur = User::find($id);
        return view('profiles.create', compact('utilisateur'));
    }


    public function mettreAJourUser(Request $request, $id)
{
    $request->validate([
        'nom' => 'required|string',
        'prenom' => 'required|string',
        'username' => 'required|string',
        'date_de_naissance' => 'required|date',
        'adresse' => 'nullable|string',
        'mobile' => 'nullable|numeric',
        'genre' => 'nullable|string|in:femme,homme',
        'bio' => 'nullable|string',
        'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10000', 
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
        'genre' => $request->filled('genre') ? $request->input('genre') : $utilisateur->genre,
    ]);

    $profile = $utilisateur->profile ?? new Profile();
    $profile->bio = $request->input('bio');

    if ($request->hasFile('photo')) {
        $photoPath = $request->file('photo')->store('images', 'public');
        $profile->photo = $photoPath;
    }

    $profile->save();

    return redirect()->route('profiles.create', ['id' => $id])->with('success', 'Profil mis à jour avec succès.');
}



    public function destroy($id)
{
    $utilisateur = User::find($id);

    if ($utilisateur) {
        $utilisateur->posts()->delete();

        $utilisateur->profile()->delete();

        $utilisateur->delete();

        return redirect()->route('liste_utilisateurs')->with('success', 'Utilisateur et ses éléments associés supprimés avec succès.');
    } else {
        return redirect()->route('liste_utilisateurs')->with('error', 'Utilisateur non trouvé.');
    }
}

}
