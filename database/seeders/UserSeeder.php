<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert([[
            'name' => 'admin',
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'password' => \Hash::make('123456789'),
            'uuid'=> Str::orderedUuid(),
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'name' => 'miku',
            'email' => 'miku@example.com',
            'email_verified_at' => now(),
            'password' => \Hash::make('123456789'),
            'uuid'=> Str::orderedUuid(),
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'name' => 'rin',
            'email' => 'rin@example.com',
            'email_verified_at' => now(),
            'password' => \Hash::make('123456789'),
            'uuid'=> Str::orderedUuid(),
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'name' => 'abc1',
            'email' => 'abc1@abc.com',
            'email_verified_at' => now(),
            'password' => \Hash::make('123456789'),
            'uuid'=> Str::orderedUuid(),
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'name' => 'abc2',
            'email' => 'abc2@abc.com',
            'email_verified_at' => now(),
            'password' => \Hash::make('123456789'),
            'uuid'=> Str::orderedUuid(),
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'name' => 'abc3',
            'email' => 'abc3@abc.com',
            'email_verified_at' => now(),
            'password' => \Hash::make('123456789'),
            'uuid'=> Str::orderedUuid(),
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'name' => 'abc4',
            'email' => 'abc4@abc.com',
            'email_verified_at' => now(),
            'password' => \Hash::make('123456789'),
            'uuid'=> Str::orderedUuid(),
            'created_at' => now(),
            'updated_at' => now(),
        ]]);


//        User::factory()->times(40)->create();
    }
}
