<?php

namespace Database\Seeders;

use App\Models\Email;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()
            ->create([
                'name' => 'Admin',
            ])
            ->emails()
                ->create([
                    'email' => 'admin@admin.com'
                ]);

        $users = User::factory(10)->create();
    
        foreach ($users as $user) {
            Email::factory()->count(mt_rand(1,5))->create([
                'user_id' => $user->id
            ]);
        }
    }
}
