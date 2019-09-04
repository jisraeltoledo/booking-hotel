<?php

use Illuminate\Database\Seeder;
use App\Room;

class RoomssTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = \Faker\Factory::create();

        // And now, let's create a few articles in our database:
        for ($i = 0; $i < 10; $i++) {
            Room::create([
                'room_name' => $faker->randomLetter,
                'hotel_id' => 1,
                'room_type' => $faker->numberBetween(1, 5),
                'room_image' => "https://www.the-connaught.co.uk/SysSiteAssets/rooms--suites/superior-queen-single-room/superior-queen-room---teaser.jpg?w=500&h=462&scale=both&mode=crop",
            ]);
        }
    }
}