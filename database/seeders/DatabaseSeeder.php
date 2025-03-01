<?php

namespace Database\Seeders;
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
        //Create 5 Users Automatically
        // \App\Models\User::factory(5)->create();

        $user = User::factory()->create([
            'name' => 'John Doe',
            'email' => 'john@gmail.com',
        ]);

        //Create List Using Factories
        \App\Models\Listing::factory(6)->create([
            'user_id' => $user->id
        ]);

        //Create 1 User with Specificied Parameters
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        //Manually Create User (HardCode) - Do Include the Path if Possible
        // \App\Models\Listing::create([
        //     'title' => 'Laravel Senior Developer',
        //     'tags' => 'laravel, javascript',
        //     'company' => 'Acme Corp',
        //     'location' => 'Boston, MA',
        //     'email' => 'email1@email.com',
        //     'website' => 'https://www.acme.com',
        //     'description' => 'Lorem Ipsum1'
        // ]);

        // \App\Models\Listing::create([
        //     'title' => 'Laravel Junior Developer',
        //     'tags' => 'php, javascript',
        //     'company' => 'ABC Corp',
        //     'location' => 'California, US',
        //     'email' => 'email2@email.com',
        //     'website' => 'https://www.abc.com',
        //     'description' => 'Lorem Ipsum 2'
        // ]);

    }
}
