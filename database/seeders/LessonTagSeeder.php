<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LessonTag;

class LessonTagSeeder extends Seeder
{
    public function run()
    {
        LessonTag::factory()->count(500)->create();
    }
}
