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
            'password' => \Hash::make('1234'),
            'uuid' => Str::orderedUuid(),
            'coin' => 100000000,
            'created_at' => now(),
            'updated_at' => now(),
        ]]);

        $name_list = [
            'KJS',
            '諸星きらり０２',
            '竈門 炭治郎０３',
            '五条 悟０４',
            'アグ０５',
            '一歌',
            'K',
            '花里 みのり',
            'ツカサ',
            '咲希',
            'Amia',
            '桐谷 遥',
            'Azusawa',
            'エム',
            '穂波',
            '志歩',
            'enanan',
            'yuki',
            '桃井 愛莉',
            '日野森 志歩',
            'siraishi',
            'shinonome',
            'AOYAMA',
            'ネネ',
            'ルイ'
        ];

        $createUser = function ($name, $idx) {
            return [
                'name' => $name,
                'email' => 'a' . (1 + $idx) . '@b.c',
                'email_verified_at' => now(),
                'password' => \Hash::make('1234'),
                'uuid' => Str::orderedUuid(),
                'coin' => 1000000000,
                'created_at' => now(),
                'updated_at' => now()
            ];
        };


        \DB::table('users')->insert(array_map($createUser, $name_list, array_keys($name_list)));
    }
}
