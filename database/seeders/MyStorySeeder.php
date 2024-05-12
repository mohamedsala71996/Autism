<?php

namespace Database\Seeders;

use App\Models\MyStory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MyStorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('MyStory')->insert([
        [
            'title1' => 'In Argentina, WHO and partnerTraining (CST) programme. around',
            'photo' => fake()->imageUrl($width = 640, $height = 480), 
        ],
        [
            'title2' => 'I use is a long established fact that a reader',
            'photo' => fake()->imageUrl($width = 640, $height = 480), 
        ],
        [
            'content' => 'We have experience in implementing projects for many large domestic and foreign corporations, enterprises in many elds such as nance, banking, F&B, education, communication.',
            'photo' => fake()->imageUrl($width = 640, $height = 480), 
        ]
        ]);
    }
}
