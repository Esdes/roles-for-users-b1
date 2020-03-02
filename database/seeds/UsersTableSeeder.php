<?php

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\Role;
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
        $adminRole = Role::where('name', 'admin')->first();
        $userRole = Role::where('name', 'user')->first();

        $admin = User::create([
        	'name' => 'admin',
        	'email' => 'admin@gmail.com',
        	'password' => Hash::make('12345')
        ]);

        $user = User::create([
        	'name' => 'user',
        	'email' => 'user@gmail.com',
        	'password' => Hash::make('12345')
        ]);

        $admin->roles()->attach($adminRole);
        $user->roles()->attach($userRole);
    }
}
