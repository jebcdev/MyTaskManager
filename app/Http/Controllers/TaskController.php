<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoteRequest;
use App\Models\Task;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
use App\Models\Category;
use App\Models\Note;
use App\Models\Status;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use PhpParser\Node\Stmt\TryCatch;

class TaskController extends Controller
{


    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $tasks = Task::query()
            ->where('user_id', Auth::id())
            ->with([
                'status',
                'category',
                'user',
                'notes',
            ])
            ->latest()
            ->paginate();

        return view('task.index', compact('tasks'))
            ->with('i', ($request->input('page', 1) - 1) * $tasks->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $task = new Task();
        $task->load([
            'status',
            'category',
            'user',
            'notes',
        ]);

        $categories = Category::all();
        $statuses = Status::all();

        return view('task.create', compact('task', 'categories', 'statuses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskRequest $request): RedirectResponse
    {
        Task::create($request->validated());

        return Redirect::route('tasks.index')
            ->with('success', __('Task created successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)/* : View */
    {

        $task->load([
            'status',
            'category',
            'user',
            'notes',
        ]);



        return view('task.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task): View
    {


        $task->load([
            'status',
            'category',
            'user',
            'notes',
        ]);

        $categories = Category::all();
        $statuses = Status::all();

        return view('task.edit', compact('task', 'categories', 'statuses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskRequest $request, Task $task): RedirectResponse
    {
        $task->update($request->validated());

        return Redirect::route('tasks.index')
            ->with('success', __('Task updated successfully'));
    }

    public function destroy($id): RedirectResponse
    {
        Task::find($id)->delete();

        return Redirect::route('tasks.index')
            ->with('success', __('Task deleted successfully'));
    }

    public function addNote(Task $task)
    {
        try {
            $note = new Note();

            $note->load([
                'task',
            ]);

            return view(
                'task.addnote.create',
                [
                    'task' => $task,
                    'note' => $note
                ]
            );
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function storeNote(NoteRequest $request): RedirectResponse
    {
        Note::create($request->validated());

        return to_route('tasks.show', $request->task_id)->with('success', __('Note created successfully'));
    }
}
