<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Generator as Faker;
use App\Models\Optional;


class OptionalsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        // $optionals = config('optionals');

        // foreach($optionals as $optional){
        //     $new_optional = new Optional(); //creo una nuova istanza della classe (del model) Optional

        //     $new_optional->name = $optional['name']; //alla proprietà name assegno il valore della chiave name dell'array
        //     $new_optional->price = $optional['price']; //alla proprietà price assegno il valore della chiave price dell'array

        //     $new_optional->save(); //salvo
        // }

        for($i=0; $i<10; $i++){
            $new_optional = new Optional(); //creo una nuova istanza della classe (del model) Optional

            $new_optional->name = $faker->word();
            $new_optional->price = $faker->randomFloat(2, 100, 500);

            $new_optional->save();
        }
    }
}
