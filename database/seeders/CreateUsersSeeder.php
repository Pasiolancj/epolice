<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'is_admin' => '1',
                'password' => Hash::make('adminpass')
            ],
            [
                'name' => 'User',
                'email' => 'user@admin.com',
                'is_admin' => '0',
                'password' => Hash::make('userpass')
            ],
        ];
        foreach($users as $key => $value){
            User::create($value);
        }
    }
}
