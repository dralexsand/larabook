<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Poll;
use App\Models\Pollitem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ApiPollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Poll::paginate(20);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($poll)
    {
        $query = Poll::where('id', $poll)
            ->with('blocks', function ($blocks) {
                $blocks
                    ->with('question')
                    ->with('pollitems')
                    ->get();
            })
            ->first();

        /*$query = $query->map(function ($item) {
            return [
                'block_id' => $item->id,
                'name' => $item->name,
            ];
        });*/

        return $query;




        /*return Poll::where('id', $poll)
            ->with('blocks')
            ->first();*/
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
