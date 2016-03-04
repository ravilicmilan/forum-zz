<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		Model::unguard();

		$this->call('UsersTableSeeder');
		$this->call('CategoryTableSeeder');
	}

}

class UsersTableSeeder extends Seeder {

    public function run() {
        //DB::table('users')->truncate();

        DB::table('users')->insert([
        	[
        		'name' => 'Jim Jones',
        		'email' => 'jim@me.com',
        		'password' => bcrypt('123456'), 
        		'admin' => 1
        	],
        	[
        		'name' => 'Mary',
        		'email' => 'mary@me.com',
        		'password' => bcrypt('123456'),
        		'admin' => 0
        	]
        ]);
    }
}

class CategoryTableSeeder extends Seeder{

    public function run() {
    	//DB::table('categories')->truncate();

        DB::table('categories')->insert([
        	[
        		'name' => 'Movies',
        		'slug' => 'movies',
        		'created_at' => Carbon::now(),
        		'updated_at' => Carbon::now()
        	],
        	[
        		'name' => 'Games',
        		'slug' => 'games',
        		'created_at' => Carbon::now(),
        		'updated_at' => Carbon::now()
        	],
        	[
        		'name' => 'Anime',
        		'slug' => 'anime',
        		'created_at' => Carbon::now(),
        		'updated_at' => Carbon::now()
        	],
        	[
        		'name' => 'TV Shows',
        		'slug' => 'tv-shows',
        		'created_at' => Carbon::now(),
        		'updated_at' => Carbon::now()
        	],
        	[
        		'name' => 'Applications',
        		'slug' => 'apps',
        		'created_at' => Carbon::now(),
        		'updated_at' => Carbon::now()
        	],
        	[
        		'name' => 'Books',
        		'slug' => 'books',
        		'created_at' => Carbon::now(),
        		'updated_at' => Carbon::now()
        	],
        	[
        		'name' => 'Misc',
        		'slug' => 'misc',
        		'created_at' => Carbon::now(),
        		'updated_at' => Carbon::now()
        	]
        ]);
    }
}
