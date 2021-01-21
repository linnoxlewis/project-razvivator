<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScopeTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('scope')->insert([
            'name' => 'Финансовая сфера',
            'description' => 'Финансовая сфера',
        ]);

        DB::table('scope')->insert([
            'name' => 'Ментальная сфера',
            'description' => 'Ментальная сфера',
        ]);

        DB::table('scope')->insert([
            'name' => 'Физическая сфера',
            'description' => 'Физическая сфера',
        ]);

        DB::table('scope')->insert([
            'name' => 'Эмоциональная сфера',
            'description' => 'Эмоциональная сфера',
        ]);

        DB::table('scope')->insert([
            'name' => 'Духовная сфера',
            'description' => 'Духовная сфера',
        ]);

        DB::table('scope')->insert([
            'name' => 'Социальная сфера',
            'description' => 'Социальная сфера',
        ]);

    }
}
