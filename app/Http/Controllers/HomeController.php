<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Categorie::with('products')->get();
        $products = Product::paginate(8);
        return view("welcome")->with(compact('categories', 'products'));
    }
}
