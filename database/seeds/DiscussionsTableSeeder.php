<?php

use Illuminate\Database\Seeder;
use App\Models\Discussion;

class DiscussionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(Discussion::class, 20)->create();
    }
}
