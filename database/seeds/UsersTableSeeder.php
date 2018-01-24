<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      User::create([
          'name'      => 'Admin',
          'email'      => 'x.zenteno.a@gmail.com',
          'password'   =>  Hash::make('123123')
      ]);
      User::create([
          'name'      => 'Admin',
          'email'      => 'alex.esp.f@gmail.com',
          'password'   =>  Hash::make('123123')
      ]);
    }
}
