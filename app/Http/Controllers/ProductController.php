<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProductRequest;
use App\Models\Categorie;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
    public function index(Request $request)
    {
        $products = Product::paginate(10);
        return view("product.index", compact("products"));
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

        Validator::make($request->all(), [
            'name' => 'required',
            'prix' => 'required',
            'description' => 'required',
            'image' => [
                'required',                
                File::image()
                ->min(10)
                ->max(12 * 1024)
                ->dimensions(Rule::dimensions()->maxWidth(10000)->maxHeight(5000)),
                ],
            ]
        )->validate();
        
        $file = $request->file("image");
        
        if ($file == '') {
            return redirect()->route("categorie.show.products", $id)->with('error', "Le produit doit avoir une image");
        }

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
    public function show($idCat, $id)
    {
        $categorie = Categorie::find($idCat);
        $product = Product::find($id);

        return view("product/show", compact("categorie", "product"));
    }

    public function searchProduct(Request $request)
    {

        if ($request->has('query')) {
            $search_text = $request->input('query');
            $categories = DB::table('categories')
            ->where('name', 'LIKE', '%'.$search_text.'%')
            ->paginate(8);
    
            return view("categorie.index", compact("categories"));
        } else {
           
            return view("categorie.index"); 
        }
    }

    public function searchProducts(Request $request)
    {
        $search = $request->search;

        $products = Product::where(function($query) use ($search){
            $query->where('name', 'like', "%$search%")
            ->orWhere('prix', 'like', "%$search%")
            ->orWhere('description', 'like', "%$search%");
            })
            ->orWhereHas('categorie', function($query) use ($search){
                $query->where('name', 'like', "%$search%");
            })
            ->paginate(8);
        
        return view("product.index", compact('products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($idCat, $id)
    {
        $categorie = Categorie::find($idCat);
        $product = Product::find($id);

        return view("product.edit", compact("categorie", "product"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idCat, $id)
    {
        $product = Product::find($id);
        $productImage = $product->image;

        $file = $request->file("image");
        
        if ($file != '') {
            Validator::make($request->all(), [
                'image' => [
                    File::image()
                    ->min(10)
                    ->max(12 * 1024)
                    ->dimensions(Rule::dimensions()->maxWidth(10000)->maxHeight(5000)),
                    ],
                ]
            )->validate();
            $imageName = time().'_'.$file->getClientOriginalName();
    
            $file->move(\public_path("images/"), $imageName);


            $product->update([
                'name' => $request->name,
                'prix' => $request->prix,
                'description' => $request->description,
                'image' => $imageName,
            ]);

            return redirect()->route("categorie.show.products", $idCat)->with('success', "Produit edité avec success");
        }

            $product->update([
                'name' => $request->name,
                'prix' => $request->prix,
                'description' => $request->description,
                'image' => $productImage,
            ]);

            return redirect()->route("categorie.show.products", $idCat)->with('success', "Produit edité avec success");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($idCat, $id)
    {
        $product = Product::find($id);

        $product->delete();

        return redirect()->route("categorie.show.products", $idCat)->with('success', "Produit supprimer avec success");
    }

    public function createProduct()
    {
        $categories = Categorie::all();

        return view("products.create", compact("categories"));
    }

    public function editProduct($id)
    {
        $categories = Categorie::all();
        $product = Product::find($id);

        return view("products.edit", compact("product", "categories"));
    }

    public function showProduct($id)
    {
        $categories = Categorie::all();
        $product = Product::find($id);

        return view("products.show", compact("product", "categories"));
    }

    public function storeProduct(Request $request)
    {
        $idCat = $request->input("categorie_id");
        Validator::make($request->all(), [
            'name' => 'required',
            'prix' => 'required|integer',
            'description' => 'required',
            'image' => [
                'required',                
                File::image()
                ->min(10)
                ->max(12 * 1024)
                ->dimensions(Rule::dimensions()->maxWidth(10000)->maxHeight(5000)),
                ],
            ]
        )->validate();
        
        $file = $request->file("image");
        $imageName = time().'_'.$file->getClientOriginalName();
        $file->move(\public_path("images/"), $imageName);

        
        $product = Product::create([
            'name' => $request->name,
            'prix' => $request->prix,
            'description' => $request->description,
            'image' => $imageName,
            'categorie_id' => $idCat,
        ]);

        return redirect()->route("products.create.index")->with('success', "Produit ajouté avec success");
    }

    public function updateProduct(Request $request, $id)
    {
        $idCat = $request->input("categorie_id");
        $product = Product::find($id);
        $imageFile = $product->image;

        Validator::make($request->all(), [
            'name' => 'required',
            'prix' => 'required|integer',
            'description' => 'required',
            'image' => [
                File::image()
                ->min(10)
                ->max(12 * 1024)
                ->dimensions(Rule::dimensions()->maxWidth(10000)->maxHeight(5000)),
                ],
            ]
        )->validate();
        
        $file = $request->file("image");
        if ($file != '') {
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path("images/"), $imageName);

            $product->update([
                'name' => $request->name,
                'prix' => $request->prix,
                'description' => $request->description,
                'image' => $imageName,
                'categorie_id' => $idCat,
            ]);
            
            $product->save();
            
            return redirect()->route('product.index')->with('success', "Produit edité avec succes");
        }

        $file = $imageFile;
        
        $product->update([
            'name' => $request->name,
            'prix' => $request->prix,
            'description' => $request->description,
            'image' => $file,
            'categorie_id' => $idCat,
        ]);

        $product->save();

        return redirect()->route('product.index')->with('success', "Produit edité avec success");
    }

    public function deleteProduct($id)
    {
        $product = Product::find($id);

        $product->delete();

        return redirect()->route('product.index')->with('success', "Produit supprimé avec succes");
    }

    public function showProductHome($id)
    {
        $product = Product::find($id);
        $categories = Categorie::all();

        return view("product/home/show", compact("product", "categories"));
    }


    public function productByCategorie($id)
    {
        $categorie = Categorie::find($id);
        $products = DB::table('products')
                    ->join('categories', 'categories.id', '=', 'products.categorie_id')
                    ->select('products.*')
                    ->where('categories.id', '=', $id)
                    ->get();

        return view("product/home/productCategorie", compact("products", "categorie"));
    }
}
