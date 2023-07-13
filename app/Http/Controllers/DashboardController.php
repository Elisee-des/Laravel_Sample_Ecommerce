<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $users = DB::table('users')
            ->latest('created_at')
            ->take(10)
            ->get();
        
        $categories = DB::table('categories')
            ->latest('created_at')
            ->take(4)
            ->get();
        
        $products = DB::table('products')
            ->latest('created_at')
            ->take(4)
            ->get();


        $nombreAdministrateurs = DB::table('users')->where('role', '=', 'admin')->count();
        $nombreUtilisateur = DB::table('users')->where('role', '=', 'user')->count();
        $nombreCategorie = DB::table('categories')->count();
        $nombreProduit = DB::table('products')->count();

        return view("dashboard", compact(
            "nombreCategorie",
            "nombreUtilisateur",
            "nombreProduit",
            "nombreAdministrateurs",
            "users",
            "products",
            "categories"
        ));
    }
}
