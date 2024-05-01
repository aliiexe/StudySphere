<?php 

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserProfileController extends Controller
{
    public function showUserProfile($userId) {
        $user = User::find($userId);
        return view('user_profile')->with('user', $user);
    }
    
    public function index()
    {
        $user = Auth::user();

        if ($user->profile && $user->profile->photo) {
            $photoPath = 'storage/' . $user->profile->photo;
        } else {
            $photoPath = asset("images/noprofil.png");
        }

        return view('user_profile_header', ['user' => $user, 'photoPath' => $photoPath]);
    }

//     public function index()
// {
//     $user = Auth::user();

//     if ($user->profile && $user->profile->photo) {
//         $photoPath = 'storage/' . $user->profile->photo;
//     } else {
//         $photoPath = asset("images/noprofil.png");
//     }

//     return view('user_profile_header', ['user' => $user, 'photoPath' => $photoPath]);
// }

}
