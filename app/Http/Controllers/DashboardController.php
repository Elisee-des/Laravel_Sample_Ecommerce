<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $categories = Categorie::all();
        $users = User::all();
        $products = Product::all();
        $ctpAdmin = User::where('role','admin')->get();
        // foreach ($users as $user) {
        //     if($user->role == 'admin')
        //     {
        //         $ctpAdmin = $cpt + 1;
        //     }
        // }

        return view("dashboard", compact("categories", "users", "products", "ctpAdmin"));
    }
}
