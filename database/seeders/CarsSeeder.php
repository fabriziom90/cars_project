<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Generator as Faker;
use App\Models\Car;

class CarsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {   

        for($i=0; $i<10; $i++){
            $car = new Car();
            
            $brand_id = $faker->randomNumber(2, false) % 10;

            $brand_id !== 0 ? $car->brand_id = $brand_id : $car->brand_id = 1;    

            $car->model_name = $faker->word();
            $car->price = $faker->randomFloat(2, 5000, 300000);
            $car->used = $faker->boolean();
            $car->km = $faker->randomFloat(2);
            $car->ports_number = 5;
            $car->cubic_capacity = $faker->randomNumber();
            $car->transmission = $faker->randomElement([1,2]); //1 - manuale, 2 - automatico
            $car->power_supply = $faker->randomElement(['benzina', 'diesel', 'elettrico', 'ibrido']);

            $car->save();

        }
    }
}
