<?php

namespace Database\Seeders;

use App\Models\Website;
use Illuminate\Database\Seeder;

class WebsiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Website::create(['name' => 'Tech Blog', 'url' => 'https://techblog.com']);
        Website::create(['name' => 'Health Blog', 'url' => 'https://healthblog.com']);
        Website::create(['name' => 'Travel Blog', 'url' => 'https://travelblog.com']);
    }
}
