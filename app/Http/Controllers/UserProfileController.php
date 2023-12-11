<?php 

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('user_profile_header', ['user' => $user, 'photoPath' => 'storage/' . $user->profile->photo]);
    }
}
