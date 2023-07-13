<?php

namespace Database\Seeders;

use App\Models\Categorie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'Informatique',
            'Man & Woman Fashion', 
            'Comestique', 
            'Electronic', 
            'Accessories de beauté', 
            'Flutter',
            'Flutter',
            "Machine Learning"];

        foreach($categories as $category)
        {
            Categorie::create([
                'name' => $category
            ]);
        }
    }
}
