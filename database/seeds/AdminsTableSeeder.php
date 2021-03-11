<?php

use Illuminate\Database\Seeder;
use App\Admin;
class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Admin::create(['name'=>'Admin','email'=>'admin@gmail.com','password'=>bcrypt('password')]);
       Admin::create(['name'=>'Manager','email'=>'manager@gmail.com','password'=>bcrypt('password')]);
    }
}
