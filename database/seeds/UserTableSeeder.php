<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        DB::table('users')->insert([
            ['id' => 1, 'name' => 'Administrator','username'=>'administrator','password'=>Hash::make('admin123'),'email'=>'admin@limakode.com','role_id'=>1],
            ['id' => 2, 'name' => 'Operator' ,'username'=>'operator','password'=>Hash::make('operator'),'email'=>'operator@limakode.com','role_id'=>2],
            ['id' => 3, 'name' => 'Registered','username'=>'registered','password'=>Hash::make('registered'),'email'=>'user@limakode.com','role_id'=>3],
        ]);
    }
}
