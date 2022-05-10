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
            'アニメ',
            'ジャズ',
            'バンド',
            'バラード',
            '演劇',
        ];

        $createCate = function ($category) {
            return [
                'name' => $category,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        };

        DB::table('categories')->insert(array_map($createCate, $cate_list));
    }
}
