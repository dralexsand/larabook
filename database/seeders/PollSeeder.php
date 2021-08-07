<?php

namespace Database\Seeders;

use App\Traits\SeederDataTrait;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PollSeeder extends Seeder
{
    use SeederDataTrait;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 19; $i++) {

            $date = date('Y-m-d H:i:s');

            $len = random_int(8, 15);
            $name = self::generateRandomOnlyString($len);

            DB::table('polls')->insert([
                'name' => ucfirst(mb_strtolower($name)),
                'created_at' => $date,
                'updated_at' => $date,
            ]);
        }
    }
}
