<?php
namespace Database\Seeders;

use App\Models\Articles\Categories;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
       Categories::factory(1)
        ->create();
    }
}
