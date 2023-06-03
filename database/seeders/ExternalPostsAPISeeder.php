<?php

namespace Database\Seeders;

use App\Models\ExternalPostsAPI;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExternalPostsAPISeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        ExternalPostsAPI::factory(10)->create();
    }
}
