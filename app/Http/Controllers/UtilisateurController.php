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
    // Validation des champs utilisateur
    $request->validate([
        'nom' => 'required|string',
        'prenom' => 'required|string',
        'username' => 'required|string',
        'date_de_naissance' => 'required|date',
        'adresse' => 'nullable|string',
        'mobile' => 'nullable|numeric',
        'genre' => 'nullable|string|in:femme,homme', // Ajoutez la validation pour le champ "genre"
        // Ajoutez d'autres règles de validation au besoin
    ]);

    // Récupération de l'utilisateur
    $utilisateur = User::find($id);

    // Vérification si l'utilisateur existe
    if (!$utilisateur) {
        return redirect()->back()->with('error', 'Utilisateur non trouvé.');
    }

    // Mise à jour des champs utilisateur
    $utilisateur->update([
        'nom' => $request->input('nom'),
        'prenom' => $request->input('prenom'),
        'username' => $request->input('username'),
        'date_de_naissance' => $request->input('date_de_naissance'),
        'adresse' => $request->input('adresse'),
        'mobile' => $request->input('mobile'),
        'genre' => $request->input('genre'),
    ]);

        // Mise à jour ou création du profil
        $profile = $utilisateur->profile ?? new Profile();
        $profile->bio = $request->input('bio');

        // Traitement de la photo (à adapter selon votre logique)
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
            $profile->photo = $photoPath;
        }

        $profile->save();

        // Redirection avec un message de succès
        return redirect()->route('profiles.create', ['id' => $id])->with('success', 'Profil mis à jour avec succès.');
    }

    //Supprimer Dashboard



    public function destroy($id)
{
    $utilisateur = User::find($id);

    if ($utilisateur) {
        // Supprimer les posts de l'utilisateur
        $utilisateur->posts()->delete();

        // Supprimer le profil de l'utilisateur
        $utilisateur->profile()->delete();

        // Supprimer l'utilisateur
        $utilisateur->delete();

        return redirect()->route('liste_utilisateurs')->with('success', 'Utilisateur et ses éléments associés supprimés avec succès.');
    } else {
        return redirect()->route('liste_utilisateurs')->with('error', 'Utilisateur non trouvé.');
    }
}

    // public function pageStatique()
    // {
    //     $postsCount = Post::count(); // Remplacez cela par la logique réelle pour obtenir le nombre de posts

    //     return view('static_page', ['postsCount' => $postsCount]);
    // }

    

}
