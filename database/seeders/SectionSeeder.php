<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sections')->insert([
            ['key' => 'about_title', 'content' => 'About Us'],
            ['key' => 'about_subtitle', 'content' => 'Learn More About Quality Time'],
            ['key' => 'about_description', 'content' => 'Kami percaya bahwa quality time...'],
            ['key' => 'about_image', 'content' => 'cafe.jpg'],
        ]);
    }
}
