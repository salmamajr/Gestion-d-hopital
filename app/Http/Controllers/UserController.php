<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showUserInfo()
    {
        $user= Auth::user();
    
        if ($user->role === 'patient') {
            $patient = $user->patient;
            return view('user_info', ['user' => $user, 'patient' => $patient]);
        } elseif ($user->role === 'medecin') {
            $medecin = $user->medecin;
            return view('user_info', ['user' => $user, 'medecin' => $medecin]);
        }
    }

}
