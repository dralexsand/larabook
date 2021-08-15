<?php

namespace App\Http\Controllers;

use App\Models\Poll;
use App\Models\Pollmodel;
use App\Models\Question;
use App\Services\PollService;
use Illuminate\Http\Request;

class PollController extends Controller
{

    protected PollService $service;


    public function __construct(PollService $pollService)
    {
        $this->service = $pollService;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Poll::orderBy('id', 'asc')->paginate(5);

        return view('poll.index', compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('poll.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Poll::create([
            'name' => $request->name,
        ]);

        return redirect()->route('poll.index')
            ->with('success', 'Post created successfully.');
    }


    /**
     * @param Poll $poll
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Poll $poll)
    {
        return view('poll.show', [
            'poll' => $poll
        ]);
    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function polls(int $id)
    {
        return $this->service->getPolls($id);
    }


    /**
     * @param Poll $poll
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Poll $poll)
    {
        return view('poll.edit', [
            'poll' => $poll
        ]);
    }


    /**
     * @param Request $request
     * @param Poll $poll
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Poll $poll)
    {
        $poll->update($request->all());

        return redirect()->route('poll.index')
            ->with('success', 'Poll updated successfully');

    }


    /**
     * @param Poll $poll
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Poll $poll)
    {
        $poll->delete();

        return redirect()->route('poll.index')
            ->with('success', 'Poll deleted successfully');
    }
}
