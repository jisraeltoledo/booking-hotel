<?php

use App\HotelDetails;
use Illuminate\Database\Seeder;

class HotelDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        HotelDetails::create([
            'name' => $faker->company,
            'address' => $faker->streetAddress,
            'city' => $faker->city,
            'state' => $faker->state,
            'country' => $faker->country,
            'zip_code' => $faker->postcode,
            'phone_number' => $faker->phoneNumber,
            'email' => $faker->email,
            'image' => "https://pix6.agoda.net/hotelImages/96605/-1/dd32d9b188d86d6d8dc40d1ff9a0ebf6.jpg?s=1024x768",
        ]);
    }
}
