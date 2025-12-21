<?php

namespace Database\Seeders;

use App\Models\Quack;
use App\Models\Quashtag;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('123456'),
        ]);

        /* Quack::factory(10)->create([ */
        /*     'user_id' => $user->id, */
        /* ]); */

        Quashtag::factory(10)->create();
    }
}
