<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\NoteRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $notes = Note::paginate();

        return view('note.index', compact('notes'))
            ->with('i', ($request->input('page', 1) - 1) * $notes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $note = new Note();

        return view('note.create', compact('note'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NoteRequest $request): RedirectResponse
    {
        Note::create($request->validated());

        return Redirect::route('notes.index')
            ->with('success', 'Note created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $note = Note::find($id);

        return view('note.show', compact('note'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $note = Note::find($id);

        return view('note.edit', compact('note'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(NoteRequest $request, Note $note): RedirectResponse
    {
        $note->update($request->validated());

        return Redirect::route('notes.index')
            ->with('success', 'Note updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Note::find($id)->delete();

        return Redirect::route('notes.index')
            ->with('success', 'Note deleted successfully');
    }
}
