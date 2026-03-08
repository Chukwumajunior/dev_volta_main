<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Display the user's profile
    public function showProfile(User $user)
    {
        return view('user.profile', compact('user'));
    }
    
}
