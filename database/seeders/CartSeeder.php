<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('carts')->insert([
            [
                'user_id'=> 1,
                'created_at'=> now(),
                'updated_at'=> now(),
            ],[
                'user_id'=> 2,
                'created_at'=> now(),
                'updated_at'=> now(),
            ],[
                'user_id'=> 3,
                'created_at'=> now(),
                'updated_at'=> now(),
            ],[
                'user_id'=> 4,
                'created_at'=> now(),
                'updated_at'=> now(),
            ],[
                'user_id'=> 5,
                'created_at'=> now(),
                'updated_at'=> now(),
            ]
        ]);
    }
}
