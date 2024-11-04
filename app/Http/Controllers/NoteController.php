<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\NoteRequest;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $notes = Note::whereHas('task', function ($query) {
            $query->where('user_id', Auth::id());
        })
        ->latest()
        ->paginate();

        return view('note.index', compact('notes'))
            ->with('i', ($request->input('page', 1) - 1) * $notes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $note = new Note();

        $note->load([
            'task',
        ]);

        $tasks=Task::where('user_id', Auth::id())->get();

        return view('note.create', compact('note', 'tasks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NoteRequest $request): RedirectResponse
    {
        Note::create($request->validated());

        return Redirect::route('notes.index')
            ->with('success', __('Note created successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note): View
    {

        $note->load([
            'task',
        ]);

        return view('note.show', compact('note'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note): View
    {

        $note->load([
            'task',
        ]);

        $tasks=Task::where('user_id', Auth::id())->get();

        return view('note.edit', compact('note', 'tasks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(NoteRequest $request, Note $note): RedirectResponse
    {
        $note->update($request->validated());

        return Redirect::route('notes.index')
            ->with('success', __('Note updated successfully'));
    }

    public function destroy($id): RedirectResponse
    {
        Note::find($id)->delete();

        return Redirect::route('notes.index')
            ->with('success', __('Note deleted successfully'));
    }
}
