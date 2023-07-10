<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categorie::all();

        return view("categorie/index", compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categorie.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategorieRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required',
        ]
        );
        
        Categorie::create([
            'name' => $request->name,
        ]);
        
        return redirect()->route("categorie.index")->with('success', "Categorie creé avec succes");
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd($id);

        return view('categorie.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categorie = Categorie::find($id);

        return view("categorie.edit", compact("categorie"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategorieRequest  $request
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $categorie = Categorie::find($id);


        Validator::make($request->all(), [
            'name' => 'required',
            ]
        );
        
        $categorie->update([
            'name' => $request->name
        ]);
        
        return redirect()->route("categorie.index")->with('success', "Categorie mise a jour");
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categorie = Categorie::findOrFail($id);

        $categorie->delete();

        return redirect()->route("categorie.index")->with('success', "Categorie supprimer avec success");

    }


    public function showProduitsByCategorie($id)
    {
        $categorie = Categorie::find($id);

        $products = DB::table('products')
                    ->join('categories', 'categories.id', '=', 'products.categorie_id')
                    ->select('products.*')
                    ->where('categories.id', '=', $id)
                    ->get();
            
        return view("categorie/showproductbycategorie", compact("products", "categorie"));
    }
}
