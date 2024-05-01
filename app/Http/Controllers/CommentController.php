<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
{
    $request->validate([
        'comment_content' => 'required|max:255',
    ]);

    if (Auth::check()) {
        $comment = new Comment([
            'user_id' => Auth::id(),
            'content' => $request->input('comment_content'),
        ]);

        $post->comments()->save($comment);

        return redirect()->route('feed');
    } else {
        return redirect()->route('login')->with('error', 'Please log in to add a comment.');
    }
}

    public function edit(Comment $comment)
    {
        // Check if the authenticated user owns the comment
        if (Auth::check() && $comment->user_id === Auth::id()) {
            return view('edit_comment', compact('comment'));
        } else {
            // Redirect the user or handle unauthorized access
            return redirect()->route('feed')->with('error', 'Unauthorized access.');
        }
    }

    public function update(Request $request, Comment $comment)
{
    if (Auth::check() && $comment->user_id === Auth::id()) {
        $request->validate([
            'comment_content' => 'required|max:255',
        ]);

        $comment->content = $request->input('comment_content');
        $comment->save();

        return redirect()->route('feed');
    } else {
        return redirect()->route('feed')->with('error', 'Unauthorized access.');
    }
}

    public function destroy(Comment $comment)
    {
        // Check if the authenticated user owns the comment
        if (Auth::check() && $comment->user_id === Auth::id()) {
            $comment->delete();

            return redirect()->route('feed');
        } else {
            // Redirect the user or handle unauthorized access
            return redirect()->route('feed')->with('error', 'Unauthorized access.');
        }
    }
    
}
