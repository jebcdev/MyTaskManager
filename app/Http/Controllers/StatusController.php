<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\StatusRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $statuses = Status::paginate();

        return view('status.index', compact('statuses'))
            ->with('i', ($request->input('page', 1) - 1) * $statuses->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $status = new Status();

        return view('status.create', compact('status'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StatusRequest $request): RedirectResponse
    {
        Status::create($request->validated());

        return Redirect::route('statuses.index')
            ->with('success', __('Status created successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $status = Status::find($id);

        return view('status.show', compact('status'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $status = Status::find($id);

        return view('status.edit', compact('status'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StatusRequest $request, Status $status): RedirectResponse
    {
        $status->update($request->validated());

        return Redirect::route('statuses.index')
            ->with('success', __('Status updated successfully'));
    }

    public function destroy($id): RedirectResponse
    {
        Status::find($id)->delete();

        return Redirect::route('statuses.index')
            ->with('success', __('Status deleted successfully'));
    }
}
