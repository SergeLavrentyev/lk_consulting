<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ['role' => \App\Models\User::CLIENT_ROLE],
            ['role' => \App\Models\User::COMPANY_ROLE],
            ['role' => \App\Models\User::MANAGER_ROLE],
        ];

        DB::table('roles')->insert($roles);
    }
}
