<?php

namespace Database\Seeders;

use App\Models\Block;
use App\Models\Question;
use App\Traits\SeederDataTrait;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
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

            $random_len_phrase = random_int(3, 7);

            Question::create([
                'block_id' => $block->id,
                'content' => self::generatePhrase($random_len_phrase),
            ]);
        }

    }
}
