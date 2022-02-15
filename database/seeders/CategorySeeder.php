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
        DB::table('categories')->insert([
            [
                'name'=> '음악',
                'created_at'=> now(),
                'updated_at'=> now(),
            ],[
                'name'=> '연극',
                'created_at'=> now(),
                'updated_at'=> now(),
            ]
        ]);

       $music_id =  DB::table('categories')->where('name','음악')->first()->id;

       info('category music id : '.$music_id);

        // 하위 카테고리
        DB::table('categories')->insert([
            [
                'name'=> 'J-POP',
                'parent_id'=> $music_id,
                'created_at'=> now(),
                'updated_at'=> now(),
            ],[
                'name'=> 'K-POP',
                'parent_id'=> $music_id,
                'created_at'=> now(),
                'updated_at'=> now(),
            ]
        ]);


    }
}
