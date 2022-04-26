<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 상위 카테고리
        $cate_list = [
            'J-POP',
            'K-POP',
            '애니메이션',
            '재즈/소울',
            '밴드',
            '발라드',
            '음악',
            '연극',
        ];

        $createCate = function ($concertData) {
            return [
                'name' => 'J-POP',
                'created_at' => now(),
                'updated_at' => now(),
            ];
        };

        DB::table('categories')->insert(array_map($createCate, $cate_list));
    }
}
