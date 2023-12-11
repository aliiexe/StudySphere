<?php 

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $user = Auth::user();
        return view('user_profile_header', ['user' => $user, 'photoPath' => 'storage/' . $user->profile->photo]);
    }
}
