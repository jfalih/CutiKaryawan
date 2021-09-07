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
            'title' => 'Cuti Besar'
        ]);
        Subcategory::create([
            'title' => 'Cuti Sakit'
        ]);
        Subcategory::create([
            'title' => 'Cuti Bersalin'
        ]);
        Subcategory::create([
            'title' => 'Cuti Karena Alasan Penting'
        ]);
        Subcategory::create([
            'title' => 'Cuti Diluar Tanggungan Negara'
        ]);
        Subcategory::create([
            'title' => 'Cuti Ibadah Haji'
        ]);
    }
}
