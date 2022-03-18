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
        \DB::table('categories')->insert([
            [
                'name'=> 'J-POP',
                'created_at'=> now(),
                'updated_at'=> now(),
            ],[
                'name'=> 'K-POP',
                'created_at'=> now(),
                'updated_at'=> now(),
            ],[
                'name'=> '애니메이션',
                'created_at'=> now(),
                'updated_at'=> now(),
            ],[
                'name'=> '재즈/소울',
                'created_at'=> now(),
                'updated_at'=> now(),
            ],[
                'name'=> '밴드',
                'created_at'=> now(),
                'updated_at'=> now(),
            ],[
                'name'=> '발라드',
                'created_at'=> now(),
                'updated_at'=> now(),
            ],[
                'name'=> '음악',
                'created_at'=> now(),
                'updated_at'=> now(),
            ],[
                'name'=> '연극',
                'created_at'=> now(),
                'updated_at'=> now(),
            ]
        ]);


    }
}
