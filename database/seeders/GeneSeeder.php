<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gene;
use Faker\Factory as Faker;

class GeneSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            Gene::create([
                'name' => $faker->word,
            ]);
        }
    }
}
