<?php

namespace Database\Seeders;

use App\Models\Listings;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::factory([
            'firstname' => 'John',
            'email'=> 'john@gmail.com'
        ])->create(); // it creates a fake data in the user table when the php artisan db:seed is been run successfully on the terminal

        Listings::factory(6)->create([
            'user_id' => $user->id
        ]); // it creates a fake data in the listings table when the php artisan db:seed is run successfully on the terminal

        // Listings::create([
        //     'title' => 'DevOps Engineer',
        //       'tags' => 'Docker, Kubernates, Jenkins, Github, Git',
        //       'company' => 'Sams Group',
        //       'location' => 'San Francisco, CA',
        //       'email' => 'sams@gmail.com',
        //       'website' => 'http://samsgroup.com',
        //       'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod sint eius inventore numquam atque incidunt magnam ad rerum illo in?'  
        //   ]); //

        //   Listings::create( [
        //     'title' => 'Full-stack Engineer',
        //     'tags' => 'html, css, javascript, php, laravel',
        //     'company' => 'Sam Groups',
        //     'location' => 'Ontario Canada',
        //     'email' => 'sam@samgroups.com',
        //     'website' => 'http://www.samgroups.com',
        //     'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod sint eius inventore numquam atque incidunt magnam ad rerum illo in?'
        // ]);

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
