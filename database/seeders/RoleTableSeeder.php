<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('roles')->truncate();
        $data = [
            ['id' => 1 ,'name' => 'Admin'],
            ['id' => 2 ,'name' => 'Member']
        ];

        DB::table('roles')->insert($data);
        Schema::disableForeignKeyConstraints();
    }
}
