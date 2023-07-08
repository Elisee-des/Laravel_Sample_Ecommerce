<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Imports\UsersImport;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;
use Maatwebsite\Excel\Facades\Excel;

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
    public function show($id)
    {
        $user = User::find($id);

        return view("users.show", compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view("users.edit", compact("user"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->update($request->all());

        return redirect()->route('user.show', $id)->with('success', "Profil edité avec succes");
    }

    public function updatePassword(Request $request, $id)
    {
        $user = User::find($id);

        Validator::make($request->all(), [
            "password" => "required",
            "repeatPassword" => "required",
        ])->validate();

        if ($request->password != $request->repeatPassword)
        {
            return redirect()->route("user.edit", $id)->with('error', "Le mot de passe n'ai pas indentique");
        }

        $newPaswword = $request->password;

        $hashPassword = Hash::make($newPaswword);

        $user->update([
            "password" => $hashPassword
        ]);

        $user->save();

        return redirect()->route('user.show', $id)->with('success', "Mot de passe edité avec succes");
    }

    public function updateImage(Request $request, $id)
    {
        
        $user = User::find($id);
        
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

        return redirect()->route('user.show', $id)->with('success', "Image modifié avec succes");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        
        $user->delete();

        return redirect()->route('user.index')->with('success', "Client supprimé avec succes");

    }


    public function searchUsers(Request $request)
    {
        if ($request->has('query')) {
            $search_text = $request->input('query');
            $users = DB::table('users')
            ->where('name', 'LIKE', '%'.$search_text.'%')
            ->orWhere('email', 'LIKE', '%'.$search_text.'%')
            ->orWhere('phone', 'LIKE', '%'.$search_text.'%')
            ->orWhere('profession', 'LIKE', '%'.$search_text.'%')
            ->paginate(10);
    
            return view("users.index", compact("users"));
        } else {
           
            return view("users.index"); 
        }
    }


        /**
    * @return \Illuminate\Support\Collection
    */
    public function export() 
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    public function importIndex() 
    {
        return view("users.importexcel");
    }
       
    /**
    * @return \Illuminate\Support\Collection
    */
    public function import() 
    {
        Excel::import(new UsersImport,request()->file('file'));
        
        return redirect()->route('user.index')->with('success', "Fichier ajouté avec success");
    }
    


}
