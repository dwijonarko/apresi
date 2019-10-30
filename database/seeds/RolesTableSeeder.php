<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('roles')->delete();
        DB::table('roles')->insert([
            ['id' => 1, 'name' => 'Administrator','description'=>'Role Administrator'],
            ['id' => 2, 'name' => 'Operator', 'description'=>'Role Operator'],
            ['id' => 3, 'name' => 'Registered', 'description'=>'Role Registered'],
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

    }
}
