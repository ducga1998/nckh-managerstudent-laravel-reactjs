<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Role, App\Models\User, App\Models\Contact, App\Models\Post, App\Models\Tag, App\Models\PostTag, App\Models\Comment;
use App\Services\LoremIpsumGenerator;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		$lipsum = new LoremIpsumGenerator;

		Role::create([
			'title' => 'Administrator',
			'slug' => 'admin'
		]);

		Role::create([
			'title' => 'Redactor',
			'slug' => 'redac'
		]);

		Role::create([
			'title' => 'User',
			'slug' => 'user'
		]);

		User::create([
			'username' => 'GreatAdmin',
			'email' => 'admin@la.fr',
			'password' => bcrypt('admin'),
			'seen' => true,
			'role_id' => 1,
			'confirmed' => true
		]);

		User::create([
			'username' => 'GreatRedactor',
			'email' => 'redac@la.fr',
			'password' => bcrypt('redac'),
			'seen' => true,
			'role_id' => 2,
			'valid' => true,
			'confirmed' => true
		]);

		User::create([
			'username' => 'Walker',
			'email' => 'walker@la.fr',
			'password' => bcrypt('walker'),
			'role_id' => 3,
			'confirmed' => true
		]);

		User::create([
			'username' => 'Slacker',
			'email' => 'slacker@la.fr',
			'password' => bcrypt('slacker'),
			'role_id' => 3,
			'confirmed' => true
		]);

		

	}

}
