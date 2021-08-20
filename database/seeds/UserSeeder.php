<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       User::create([
            'email' => 'karyawan@gmail.com',
            'nik' => '1231231231212',
            'saldo_cuti' => 12,
            'password' => Hash::make('karyawan123'),
            'name' => 'Karyawan',
            'level' => 'karyawan',
            'active' => 1
        ]);
        User::create([
            'email' => 'staff@gmail.com',
            'nik' => '1231231231212',
            'saldo_cuti' => 12,
            'password' => Hash::make('staff123'),
            'name' => 'Staff',
            'level' => 'staff',
            'active' => 1
        ]);
        User::create([
            'email' => 'hrd@gmail.com',
            'nik' => '1231231231212',
            'saldo_cuti' => 12,
            'password' => Hash::make('hrd123'),
            'name' => 'Hrd',
            'level' => 'hrd',
            'active' => 1
        ]);
    }
}
