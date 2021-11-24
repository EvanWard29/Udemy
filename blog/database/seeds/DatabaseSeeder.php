<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        DB::table('users')->truncate();
        DB::table('posts')->truncate();
        DB::table('roles')->truncate();
        DB::table('photos')->truncate();

        //$this->call(UserTableSeeder::class);
        factory(App\User::class, 10)->create()->each(function($user){
            $user->posts()->save(factory(App\Post::class)->make());
        });

        factory(App\Role::class, 2)->create();

        factory(App\Photo::class, 1)->create();
        
    }
}
