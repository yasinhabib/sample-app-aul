<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menu_roles')->insert([
            'id' => 1,
            'menu_id' => 1,
            'role_id' => 1,
        ]);
        DB::table('menu_roles')->insert([
            'id' => 2,
            'menu_id' => 2,
            'role_id' => 1,
        ]);
        DB::table('menu_roles')->insert([
            'id' => 3,
            'menu_id' => 3,
            'role_id' => 2,
        ]);
        DB::table('menu_roles')->insert([
            'id' => 4,
            'menu_id' => 4,
            'role_id' => 3,
        ]);

        DB::table('menu_roles')->insert([
            'id' => 5,
            'menu_id' => 5,
            'role_id' => 1,
        ]);
    }
}
