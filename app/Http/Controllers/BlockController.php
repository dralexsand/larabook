<?php

namespace App\Http\Controllers;

use App\Models\Block;
use App\Models\Poll;
use App\Models\Question;
use App\Models\Type;
use Illuminate\Http\Request;

class BlockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Block::latest()->paginate(5);

        return view('blocks.index', compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blocks.create', [
            'types' => Type::get(),
            'polls' => Poll::get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Block::create($request->all());

        return redirect()->route('blocks.index')
            ->with('success', 'Block created successfully.');
    }


    /**
     * @param Block $block
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Block $block)
    {
        return view('blocks.show', compact('block'));
    }


    /**
     * @param Block $block
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Block $block)
    {
        //return view('blocks.edit', compact('block'));
        return view('blocks.edit', [
            'block' => $block,
            'types' => Type::get(),
            'polls' => Poll::get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Block $block
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Block $block)
    {

        $block->update($request->all());

        /*Question::where('block_id', $block->id)
            ->update([
                '' => ''
            ]);*/

        return redirect()->route('blocks.index')
            ->with('success', 'Block updated successfully');
    }


    /**
     * @param Block $block
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Block $block)
    {
        $block->delete();

        return redirect()->route('blocks.index')
            ->with('success', 'Block deleted successfully');
    }
}
