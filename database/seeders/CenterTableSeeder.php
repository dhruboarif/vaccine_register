<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CenterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Center::class, 100)->create();
    }
}
