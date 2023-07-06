<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;

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

        return redirect()->route('profil')->with('success', "Profil modifier avec succes");
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


    public function imageEdit(Request $request)
    {
        $userId = Auth::id();
        
        $user = User::find($userId);
        
        $input = $request->file('image');

        Validator::validate($request->all(), [
            'image' => [
                    'required',                
                    File::image()
                    ->min(102)
                    ->max(12 * 1024)
                    ->dimensions(Rule::dimensions()->maxWidth(10000)->maxHeight(5000)),
            ],
        ]);


        $file = $request->file("image");
        $imageName = time().'_'.$file->getClientOriginalName();
        $file->move(\public_path("images/"), $imageName);
            
        $user->update([
            "image" => $imageName
        ]);
        
        $user->save();

        return redirect()->route('profil')->with('success', "Image modifié avec succes");
    }
}
