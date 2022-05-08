<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        User::truncate();
        
        DB::table('role_user')->truncate();

        $user1 = User::factory()->create();
        $user2 = User::factory()->create();


        Schema::enableForeignKeyConstraints();

        $user1->roles()->sync([Role::ADMIN]);
        $user2->roles()->sync([Role::MEMBER]);

    }
}
