<?php

use Illuminate\Database\Seeder;
use Bican\Roles\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// $this->call(UsersTableSeeder::class);

    	/*
		$adminRole = Role::create([
		    'name' => 'Admin',
		    'slug' => 'admin',
		    'description' => '', // optional
		    'level' => 1, // optional, set to 1 by default
		]);

		$seniorHelperRole = Role::create([
		    'name' => 'Senior Helper',
		    'slug' => 'senior.helper',
		    'description' => '', // optional
		    'level' => 2, // optional, set to 1 by default
		]);

		$helperRole = Role::create([
		    'name' => 'Helper',
		    'slug' => 'helper',
		    'description' => '', // optional
		    'level' => 3, // optional, set to 1 by default
		]);

		$translatorRole = Role::create([
		    'name' => 'Translator',
		    'slug' => 'translator',
		    'description' => '', // optional
		    'level' => 4, // optional, set to 1 by default
		]);

		$userRole = Role::create([
		    'name' => 'User',
		    'slug' => 'user',
		    'description' => '', // optional
		    'level' => 5, // optional, set to 1 by default
		]);
		*/
    }
}
