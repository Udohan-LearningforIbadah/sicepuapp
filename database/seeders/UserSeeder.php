<?php

namespace Database\Seeders;

use App\models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();
        $user->name = 'Testing User';
        $user->email = 'testing@gmail.com';
        $user->password = Hash::make('testing123');
        $user->telp= '123456789';
        $user->role = 'user';
        $user->save();
    }
}
