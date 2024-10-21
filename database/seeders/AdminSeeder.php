<?php

namespace Database\Seeders;

use app\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();
        $user->name = 'Admin no_123';
        $user->email = 'admin123@gmail.com';
        $user->password = Hash::make('admin123');
        $user->telp= '123456789';
        $user->role = 'admin';
        $user->save();
    }
}
