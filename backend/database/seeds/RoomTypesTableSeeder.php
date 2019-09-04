<?php

use Illuminate\Database\Seeder;
use App\RoomType;

class RoomTypesTableSeeder extends Seeder
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
        for ($i = 0; $i < 5; $i++) {
            RoomType::create([
                'room_type_name' => $faker->catchPhrase,                
            ]);
        }
    }
}
