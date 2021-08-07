<?php

namespace Database\Seeders;

use App\Models\Block;
use App\Models\Poll;
use App\Traits\SeederDataTrait;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlockSeeder extends Seeder
{
    use SeederDataTrait;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $polls = Poll::get();

        foreach ($polls as $poll) {

            $random_count_blocks = random_int(5, 11);

            for ($i = 0; $i < $random_count_blocks; $i++) {

                $random_type = random_int(1, 2);
                $len = random_int(8, 15);
                $name = self::generateRandomOnlyString($len);

                Block::create([
                    'poll_id' => $poll->id,
                    'name' => ucfirst(mb_strtolower($name)),
                    'type_id' => $random_type,
                ]);
            }
        }
    }
}
