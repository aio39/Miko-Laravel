<?php

namespace Database\Seeders;

use App\Http\Resources\ProductResource;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            ConcertSeeder::class,
            TicketSeeder::class,
            CoinHistorySeeder::class,
            UserTicketSeeder::class,
            ProductSeeder::class,
            CartSeeder::class,
        ]);

    }
}
