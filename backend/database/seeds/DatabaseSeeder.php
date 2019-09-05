<?php

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
        //  $this->call(UsersTableSeeder::class);
        //  $this->call(HotelDetailsTableSeeder::class);
        // $this->call(RoomTypesTableSeeder::class);
        // $this->call(RoomssTableSeeder::class);
        $this->call (BookingssTableSeeder::class);
    }
}
