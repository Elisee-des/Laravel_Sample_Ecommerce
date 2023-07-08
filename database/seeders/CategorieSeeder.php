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
        $categories = ['Informatique','Menager', 'Mecanique', 'React Native', 'Flutter', "Machine Learning"];

        foreach($categories as $category)
        {
            Categorie::create([
                'name' => $category
            ]);
        }
    }
}
