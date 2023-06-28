<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;

use App\Models\Poll;

class PollController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $polls = Poll::all();
        return Inertia::render('Poll/Index', [ 'polls' => $polls ]);
    }

     /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Poll/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        if($request->validate([
            'name' => ['required', 'max:20'],
            'description' => ['required', 'max:250'],
            'status' => ['required'],
        ])){
            $poll = new Poll();
            $poll->name = $request->name;
            $poll->description = $request->description;
            $poll->status = $request->status;
            $poll->user_id = $user->id;
            $poll->save();
        }
        return to_route('poll.create');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Poll $poll)
    {
        return Inertia::render('Poll/Edit', [ 'poll' => $poll ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Poll $poll)
    {
        $request->validate([
            'name' => ['required', 'max:20'],
            'description' => ['required', 'max:250'],
            'status' => ['required'],
        ]);

        $poll->name = $request->name;
        $poll->description = $request->description;
        $poll->status = $request->status;
        $poll->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Poll $poll)
    {
        $poll->delete();
        return redirect()->route('poll.index')->with('message', 'Encuesta borrada correctamente');
    }
}
