<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1; $i<27; $i=$i+1) {
            DB::table('carts')->insert(
                [
                    'user_id' => $i,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
        }
    }
}
