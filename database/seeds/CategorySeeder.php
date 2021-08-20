<?php

use Illuminate\Database\Seeder;
use App\Category;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'title' => 'Cuti tahunan'
        ]);
        
        Category::create([
            'title' => 'Cuti lain-lain'
        ]);
    }
}
