<?php

use App\Sprint;
use Illuminate\Database\Seeder;

class SprintsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Let's truncate our existing records to start from scratch.
        Sprint::truncate();

        $faker = \Faker\Factory::create();

        // And now, let's create a few articles in our database:
        for ($i = 0; $i < 50; $i++) {
            Sprint::create([
                'nama_sprint' => $faker->sentence,
                'desc_sprint' => $faker->paragraph,
                'tgl_mulai' => $faker->date,
                'tgl_selesai' => $faker->date
            ]);
        }
    }
}
