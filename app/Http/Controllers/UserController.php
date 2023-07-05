<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profil()
    {
        return view('user/profil');
    }

    public function profilParametre()
    {
        return view('user/parametre');
    }

    public function profilEdition(Request $request)
    {
        $userId = Auth::id();
        
        $user = User::find($userId);

        $user->update($request->all());

        return redirect()->route('profil');
    }
}
