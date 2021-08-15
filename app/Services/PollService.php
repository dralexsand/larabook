<?php
declare(strict_types=1);


namespace App\Services;


use App\Models\Poll;


final class PollService
{

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function getPolls(int $id)
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
