<?php

use Illuminate\Database\Seeder;
use App\Subcategory;
class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Subcategory::create([
            'title' => 'Cuti tahunan'
        ]);
        
        Subcategory::create([
            'title' => 'Cuti lain-lain'
        ]);
    }
}
