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
            'KimJS01',
            'JangHS02',
            'YeSJ03',
            'SuMS04',
            'GuNH05',
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

        $createUser2 = function ($name, $idx) {
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

        \DB::table('users')->insert(array_map($createUser2, $name_list, array_keys($name_list)));

        $class_num_list = [
            '1801242',
            '2001504',
            '2001321',
            '1701108',
            '1602432',
            '1701073',
            '1701200',
            '2001303',
            '2001332',
            '1801108',
            '1601106',
            '1701222',
            '1701076',
            '2001287',
            '1801302',
            '1701278',
            '1901308',
            '1801128',
            '1807110',
            '2001260',
            '1801143',
            '1801166',
            '1701302',
            '1801147',
            '2001370',
            '1901322',
            '1801074',
            '1701252',
            '1801276',
            '1801233',
            '1901044',
            '1801228',
            '2001482',
            '1701232',
        ];


        $createUser2 = function ($name, $idx) {
            return [
                'name' => $name,
                'email' => $name . '@b.c',
                'email_verified_at' => now(),
                'password' => \Hash::make('1234'),
                'uuid' => Str::orderedUuid(),
                'coin' => 1000000000,
                'created_at' => now(),
                'updated_at' => now()
            ];
        };

        \DB::table('users')->insert(array_map($createUser2, $class_num_list, array_keys($class_num_list)));

    }
}
