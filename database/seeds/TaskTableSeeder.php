<?php

use App\Modules\admin\helpers\StatusHelper;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for ($i =0 ; $i < 4000 ; $i++)
        {
            DB::table('task')->insert([
                'name' => $faker->text(100),
                'description' => $faker->realText(rand(100,600)),
                'scope_id' => array_rand(App\Http\Models\Scope::getList()),
                'status' =>array_rand(array_keys(StatusHelper::list())),
            ]);
        }
    }
}
