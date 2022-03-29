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
            'email' => 'admin@b.c',
            'email_verified_at' => now(),
            'password' => \Hash::make('123'),
            'uuid' => Str::orderedUuid(),
            'coin' => 100000000,
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'name' => '初音ミク０１',
            'email' => 'a1@b.c',
            'email_verified_at' => now(),
            'password' => \Hash::make('123'),
            'uuid' => Str::orderedUuid(),
            'coin' => 100000000,
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'name' => '諸星きらり０２',
            'email' => 'a2@b.c',
            'email_verified_at' => now(),
            'password' => \Hash::make('123'),
            'uuid' => Str::orderedUuid(),
            'coin' => 100000000,
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'name' => '竈門 炭治郎０３',
            'email' => 'a3@b.c',
            'email_verified_at' => now(),
            'password' => \Hash::make('123'),
            'uuid' => Str::orderedUuid(),
            'coin' => 100000000,
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'name' => '五条 悟０４',
            'email' => 'a4@b.c',
            'email_verified_at' => now(),
            'password' => \Hash::make('123'),
            'uuid' => Str::orderedUuid(),
            'coin' => 100000000,
            'created_at' => now(),
            'updated_at' => now(),
        ]]);
    }
}
