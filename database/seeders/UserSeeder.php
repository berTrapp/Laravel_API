<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(!User::where('email', 'bernardo.trapp@teste')->first()){
            User::create([
                'name' => 'Bernardo',
                'email' => 'bernardo.trapp@teste',
                'password' => Hash::make('senha123', ['rounds' => 12]),
            ]);
        }
        if(!User::where('email', 'hercules.trapp@teste')->first()){
            User::create([
                'name' => 'Hercules',
                'email' => 'hercules.trapp@teste',
                'password' => Hash::make('senha123', ['rounds' => 12]),
            ]);
        }
        if(!User::where('email', 'emiliano.trapp@teste')->first()){
            User::create([
                'name' => 'Emiliano',
                'email' => 'emiliano.trapp@teste',
                'password' => Hash::make('senha123', ['rounds' => 12]),
            ]);
        }
    }
}
