<?php

use Illuminate\Database\Seeder;
use App\models\Page;
class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Page::class, 20)->create();
    }
}
