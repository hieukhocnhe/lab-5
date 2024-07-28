<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Movie;
use App\Models\Gene;
use Faker\Factory as Faker;

class MovieSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $genres = Gene::all();

        if ($genres->isEmpty()) {
            $this->command->error('Không có thể loại phim nào trong cơ sở dữ liệu.');
            return;
        }

        foreach (range(1, 50) as $index) {
            Movie::create([
                'title' => $faker->sentence,
                'poster' => $faker->imageUrl(800, 600, 'movies'),
                'intro' => $faker->paragraph,
                'release_date' => $faker->date,
                'genre_id' => $faker->randomElement($genres->pluck('id')->toArray()),
            ]);
        }
    }
}
