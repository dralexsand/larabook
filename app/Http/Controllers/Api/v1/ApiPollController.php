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
        return [
            'success' => true,
            'data' => [],
        ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return [
            'success' => true,
            'data' => [],
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return [
            'success' => true,
            'data' => [],
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return [
            'success' => true,
            'data' => [],
        ];
    }
}
