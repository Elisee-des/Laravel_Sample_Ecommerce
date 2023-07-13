<?php

namespace Database\Seeders;

use App\Models\Categorie;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = Categorie::all();

        for ($i=0; $i < 20; $i++) { 

            $prix = random_int(2500, 100000);

            $description = "Description du produit";

            Product::create([
                'name' => "Produit $i",
                'prix' =>  $prix,
                'description' =>  $description . " " . $i,
                'categorie_id' => $categories->random()->id,
            ]);
        }
    }
}
