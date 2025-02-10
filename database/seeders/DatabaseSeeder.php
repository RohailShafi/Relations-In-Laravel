<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\Post;
use App\Models\Role;
use App\Models\User;
use App\Models\UserRole;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

//        Insert countries data

//        Country::factory(15)->create();

//        Insert users

//        User::factory(10)->create();

//        Create Roles

//        Role::factory(20)->create();

//        Insert posts

//        Post::factory(50)->create();

//
//        User::factory()->create([
//            'name' => 'Test User',
//            'email' => 'test@example.com',
//        ]);

        UserRole::factory()->create([
            'user_id' => function(){
                return User::inRandomOrder()->first()->id;
            },

            'role_id' => function(){
                return Role::inRandomOrder()->first()->id;
            }
        ]);
    }

}
