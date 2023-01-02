<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->create([
            'name' => 'McAran Nodchriss',
            'email' => 'mcarannodchriss@gmail.com',
            'role' => 'Admin',
        ]);

        \App\Models\User::factory(10)->create();

        \App\Models\Category::factory()->create(
            [
                'name' => 'Meat',
                'measure' => 'weight',
            ],
        );

        \App\Models\Category::factory(2)->create();

        \App\Models\WasteType::factory(3)->create();

//        \App\Models\Waste::factory(1)->create(
//            [
//
//            ]
//        );
    }
}
