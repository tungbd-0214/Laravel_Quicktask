<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
		$users = [
			[
				'email' => 'user1.account@sun-asterisk.com',
				'email_verified_at' => now(),
				'password' => bcrypt('12345678'),
				'first_name' => 'user 1',
				'last_name' => 'account',
				'is_active' => true,
				'is_admin' => false,
				'username' => 'user1-account',
			],
			[
				'email' => 'user2.account@sun-asterisk.com',
				'email_verified_at' => now(),
				'password' => bcrypt('12345678'),
				'first_name' => 'user 2',
				'last_name' => 'account',
				'is_active' => true,
				'is_admin' => false,
				'username' => 'user2-account',
			],
			[
				'email' => 'user3.account@sun-asterisk.com',
				'email_verified_at' => now(),
				'password' => bcrypt('12345678'),
				'first_name' => 'user3',
				'last_name' => 'account',
				'is_active' => true,
				'is_admin' => false,
				'username' => 'user3-account',
			],
		];

		User::unguard();

		foreach($users as $user) {
			$user = User::create($user);
		};

		User::factory(10)->create();

		$roleIDs = DB::table('roles')->where('name', '!=', 'admin')->pluck('id');
		$userIDs= DB::table('users')->pluck('id');
		$roles_users = [];

		foreach (range(1, $userIDs->count()) as $index) {
            $roles_users[] = [
            	'role_id' => fake()->randomElement($roleIDs),
            	'user_id' => fake()->randomElement($userIDs),
				'created_at' => now(),
			];
        }

		DB::table('role_user')->insert($roles_users);
    }
}
