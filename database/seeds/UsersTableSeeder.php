<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
			User::truncate();
			DB::table('role_user')->truncate();

			$adminRole = Role::where('name', 'admin')->first();        
			$userRole = Role::where('name', 'user')->first();

			$admin = User::create([
				'name' => 'Admin',
				'email' => 'admin@email.com',
				'password' => bcrypt('admin123')
			]);

			$user = User::create([
				'name' => 'User',
				'email' => 'user@email.com',
				'password' => bcrypt('user1234')
			]);

			$admin->roles()->attach($adminRole);
			$user->roles()->attach($userRole);

			factory(User::class, 20)->create();
			
    }
}
