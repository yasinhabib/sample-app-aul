<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menus')->insert([
            'id' => 1,
            'menu_name' => 'Menu',
            'url' => '/menu',
        ]);

        DB::table('menus')->insert([
            'id' => 2,
            'menu_name' => 'Role',
            'url' => '/role',
        ]);

        DB::table('menus')->insert([
            'id' => 3,
            'menu_name' => 'Produk',
            'url' => '/produk',
        ]);

        DB::table('menus')->insert([
            'id' => 4,
            'menu_name' => 'Keuangan',
            'url' => '/keuangan',
        ]);

        DB::table('menus')->insert([
            'id' => 5,
            'menu_name' => 'User',
            'url' => '/user',
        ]);
    }
}
