<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        $user = Auth::user();

        $photoPath = $user->profile && $user->profile->photo
            ? 'storage/' . $user->profile->photo
            : asset("images/noprofil.png");

        return view('index', compact('posts','user', 'photoPath'));
    }

    public function userprofilephoto($postId){
        $post = Post::find($postId);
        if ($post) {
            $user = $post->user;
            $photo_path = $user->profile->where('utilisateur_id', $user->id)->value('photo');
            return $photo_path;
        } else {
            return "Post not found";
        }
    }
    
    

    public function create()
    {
        $user = Auth::user();

    $photoPath = $user->profile && $user->profile->photo
        ? 'storage/' . $user->profile->photo
        : asset("images/noprofile.png");

        
        return view('create_post',compact('user', 'photoPath'));
    }

    public function store(Request $request)
{
    $request->validate([
        'content' => 'required|max:500',
        'file' => 'nullable|mimes:pdf,doc,docx,xls,xlsx,jpeg,png,jpg,gif,svg|max:2048',
    ]);

    if (Auth::check()) {
        $user = Auth::user();

        $newPost = new Post([
            'content' => $request->content,
            'user_id' => $user->id,
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filePath = $file->storeAs('uploads', $file->getClientOriginalName(), 'public');
            $newPost->file_path = $filePath;
        }

        $newPost->save();

        return redirect()->route('feed');
    } else {
        return redirect()->route('login')->with('error', 'Please log in to create a post.');
    }
}
    public function edit(Post $post)
    {
        $user = Auth::user();

        $photoPath = $user->profile && $user->profile->photo
            ? 'storage/' . $user->profile->photo
            : asset("images/noprofile.png");
        return view('edit_post', compact('post','user', 'photoPath'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'content' => 'required|max:500',
            'file' => 'nullable|mimes:pdf,doc,docx,xls,xlsx,jpeg,png,jpg,gif,svg|max:10000',
        ]);
    
        $post->content = $request->content;

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filePath = $file->storeAs('uploads', $file->getClientOriginalName(), 'public');
            $post->file_path = $filePath;
        }
    
        $post->save();
    
        return redirect()->route('feed');
    }

    public function destroy(Post $post)
    {
        $post->delete();
    
        return redirect()->route('feed');
    }
   public function comment(Request $request, Post $post)
{
    $request->validate([
        'comment_content' => 'required|max:255',
    ]);

    if (Auth::check()) {
        $comment = new Comment([
            'user_id' => Auth::id(),
            'content' => $request->input('comment_content')[0], 
        ]);

        $post->comments()->save($comment);

        return redirect()->route('feed');
    } else {
        return redirect()->route('login')->with('error', 'Please log in to add a comment.');
    }
}

    

    public function likeAjax(Request $request, Post $post)
    {
        $action = $request->input('action', 'like');
    
        if ($action === 'like') {
            $likes = $post->likes ?? 0;
            $post->update(['likes' => $likes + 1]);
        } elseif ($action === 'dislike') {
            $likes = $post->likes ?? 0;
            $post->update(['likes' => max(0, $likes - 1)]);
        }
        return response('Like status updated successfully', Response::HTTP_OK);
    }

    public function like(Post $post)
{
    $user = Auth::user();

    $existingLike = $post->likes()->where('user_id', $user->id)->first();

    if ($existingLike) {
        $existingLike->delete();
        $liked = false;
    } else {
        $post->likes()->create(['user_id' => $user->id]);
        $liked = true;
    }

    return response()->json(['liked' => $liked]);
}
}