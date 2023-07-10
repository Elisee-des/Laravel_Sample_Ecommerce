<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProductRequest;
use App\Models\Categorie;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $categorie = Categorie::find($id);

        return view("product.create", compact("categorie"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {

        $categorie = Categorie::find($id);

        Validator::make($request->all(), [
            'name' => 'required',
            'prix' => 'required',
            'description' => 'required',
            'image' => [
                'required',                
                File::image()
                ->min(102)
                ->max(12 * 1024)
                ->dimensions(Rule::dimensions()->maxWidth(10000)->maxHeight(5000)),
                ],
            ]
        );
        
        $file = $request->file("image");
        $imageName = time().'_'.$file->getClientOriginalName();
        $file->move(\public_path("images/"), $imageName);
        
        $product = Product::create([
            'name' => $request->name,
            'prix' => $request->prix,
            'description' => $request->description,
            'image' => $imageName,
            'categorie_id' => $id,
        ]);

        return redirect()->route("categorie.show.products", $id)->with('success', "Produit creé avec succes");
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
