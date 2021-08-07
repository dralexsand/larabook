<?php

namespace Database\Seeders;

use App\Models\Block;
use App\Models\Pollitem;
use App\Traits\SeederDataTrait;
use Illuminate\Database\Seeder;

class PollitemSeeder extends Seeder
{

    use SeederDataTrait;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $blocks = Block::get();

        foreach ($blocks as $block) {

            $random_count_pollitems = random_int(5, 11);

            for ($i = 0; $i < $random_count_pollitems; $i++) {

                $random_len_phrase = random_int(3, 7);

                Pollitem::create([
                    'block_id' => $block->id,
                    'content' => self::generatePhrase($random_len_phrase),
                    'type_id' => $block->type_id,
                ]);
            }
        }
    }
}
