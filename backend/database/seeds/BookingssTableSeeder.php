<?php

use Illuminate\Database\Seeder;
use App\Booking;
use Illuminate\Support\Facades\Log;

class BookingssTableSeeder extends Seeder
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
            $format = 'Y-m-d';
            $date = $faker->date ('Y-m-d', '01-11-2019');
            $total_nights = $faker->numberBetween(1, 5);
            $date_start = DateTime::createFromFormat($format , $date);
            $date_end = date('Y-m-d', strtotime($date . ' + ' . $total_nights . ' days'));
            
            Booking::create([
                'room_id' => $faker->numberBetween(2, 11), 
                'date_start' => $date_start, 
                'date_end' => $date_end, 
                'customer_fullname' => $faker->name(), 
                'customer_email' => $faker->email (), 
                'customer_phone' => $faker->phoneNumber(), 
                'total_nights' => $total_nights, 
                'total_price' => $faker->randomFloat (2, 100, 1000), 
                'user_id' => 1
            ]);
        }
    }
}
