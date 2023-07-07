<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('users/index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("users.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
            "repeatPassword" => "required",
            'image' => [
                    File::image()
                    ->min(102)
                    ->max(12 * 1024)
                    ->dimensions(Rule::dimensions()->maxWidth(10000)->maxHeight(5000)),
            ],
        ]
        );

        if ($request->password != $request->repeatPassword)
        {
            return redirect()->route('user.create')->with('error', "Le mot de passe n'ai pas indentique");
        }

        $newPaswword = $request->password;

        $hashPassword = Hash::make($newPaswword);

        $file = $request->file("image");
        if ($file != '') {
            $imageName = time().'_'.$file->getClientOriginalName();
            $file->move(\public_path("images/"), $imageName);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $hashPassword,
                "phone" => $request->phone,
                "adress" => $request->adress,
                "profession" => $request->profession,
                "image" => $imageName
                
            ]);

            $user->save();

            return redirect()->route('user.index')->with('success', "Client creér avec succes");
        }

        $file = 'Aucune image enregistré';
            
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $hashPassword,
            "phone" => $request->phone,
            "adress" => $request->adress,
            "profession" => $request->profession,
            "image" => $file
            
        ]);

        $user->save();

        return redirect()->route('user.index')->with('success', "Client creér avec succes");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
