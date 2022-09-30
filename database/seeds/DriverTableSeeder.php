<?php

use Illuminate\Database\Seeder;
use App\Driver;
class DriverTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i< 30; $i++) {
            factory(App\Driver::class)->create();
        }
    }
}
