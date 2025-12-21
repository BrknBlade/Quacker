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
            'name' => 'Ignacio',
            'email' => 'ignacio@email.com',
            'password' => bcrypt('amoelmvc'),
        ]);

        /* Quack::factory(10)->create([ */
        /*     'user_id' => $user->id, */
        /* ]); */

        Quashtag::factory(10)->create();
    }
}
