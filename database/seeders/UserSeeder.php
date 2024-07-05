<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $password = Hash::make('password');
        $users = [
            ['id'=>1,'name'=>'Admin','email'=>'admin@admin.com','password'=>$password,'dob'=>'2024-05-03','status'=>1],
            ['id'=>2,'name'=>'Sub admin','email'=>'subadmin@admin.com','password'=>$password,'dob'=>'2023-05-03','status'=>0],

        ];

        User::insert($users);
    }
}
