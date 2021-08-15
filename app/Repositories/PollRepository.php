<?php
declare(strict_types=1);

namespace App\Repositories;

use App\Models\Poll;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;


/**
 * Class PollRepository.
 */
class PollRepository
{

    protected $model;

    /**
     * PollRepository constructor.
     * @param Poll $poll
     */
    public function __construct(Poll $poll)
    {
        $this->model = $poll;
    }


    /**
     * @return Poll
     */
    /*public function model(): Poll
    {
        return Poll::class;
    }*/


    /**
     * @param int $id
     * @return array
     */
    public function getPolls(int $id): array
    {
        $query = Poll::where('id', $id)
            ->with('blocks', function ($blocks) {
                $blocks
                    ->with('question')
                    ->with('pollitems')
                    ->get();
            })
            ->first();

        return [
            'success' => true,
            'data' => $query,
        ];
    }

}
