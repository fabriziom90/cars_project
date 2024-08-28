<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Generator as Faker;
use App\Models\Brand;

class BrandsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {   

        for($i=0; $i<10; $i++){
            $brand = new Brand();
            $brand->name = $faker->word();
            $brand->logo = 'https://picsum.photos/200/200?random='.$i+1;

            $brand->save();
        }
    }
}
