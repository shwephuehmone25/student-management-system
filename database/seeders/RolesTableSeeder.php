<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            ['name' => 'Admin', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Student', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Monitor', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
