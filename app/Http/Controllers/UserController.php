<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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

    public function passwordEdit(Request $request)
    {

        $userId = Auth::id();
        
        $user = User::find($userId);

        Validator::make($request->all(), [
            "password" => "required",
            "repeatPassword" => "required",
        ])->validate();

        if ($request->password != $request->repeatPassword)
        {

            return redirect()->route('profil.parametre')->with('error', "Le mot de passe n'ai pas indentique");
        }

        $newPaswword = $request->password;

        $hashPassword = Hash::make($newPaswword);

        $user->update([
            "password" => $hashPassword
        ]);

        $user->save();

        return redirect()->route('profil')->with('success', "Le mot de passe modifier avec success");
    }
}
