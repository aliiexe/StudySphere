<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class ListePostsController extends Controller
{
    public function index()
    {
        return view('liste_posts');
    }

    public function showStaticPage()
    {
        return view('static_page');
    }

    
    public function showUserStats()
    {
        $utilisateurs = User::count();
        $postsCount = Post::count();

        return view('static_page', compact('utilisateurs', 'postsCount'));

    }


    public function listePosts()
    {
        $posts = Post::all();
        return view('liste_posts', compact('posts'));
    }



    public function destroy($id)
    {
        $post = Post::find($id);

        if ($post) {
            $post->delete();
            return redirect()->route('liste_posts')->with('success', 'Post supprimé avec succès.');
        } else {
            return redirect()->route('liste_posts')->with('error', 'Post non trouvé.');
        }
    }
}
