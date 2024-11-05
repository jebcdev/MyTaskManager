@extends('adminlte::page')

@section('title')
    {{ config('app.name') }}
@stop

@section('content_header')
    <div class="row align-items-center">
        <div class="col-6 d-flex">
            <h1 class="me-auto">
                <span class="card-title">{{ __('Task Details') }}</span>
            </h1>
        </div>
        <div class="col-6 d-flex justify-content-end">
            <a href="{{ route('tasks.index') }}" class="btn  btn-primary">
                {{ __('Back') }}
            </a>
        </div>
    </div>
@stop

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">


                    <div class="card-body bg-white">

                        <div class="form-group mb-2 mb20">
                            <strong>{{ __('User') }}</strong>
                            {{ $task->user->name }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>{{ __('Category') }}</strong>
                            {{ $task->category->name }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>{{ __('Status') }}</strong>
                            {{ $task->status->name }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>{{ __('Name') }}:</strong>
                            {{ $task->name }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>{{ __('Description') }}:</strong>
                            {{ $task->description }}
                        </div>

                    </div>

                    <div class="m-1 p-1">
                        <a class="btn btn-primary" href="{{ route('tasks.addNote',$task) }}">
                            {{__('Add Notes')}}</a>
                    </div>
                </div>
            </div>
        </div>

        @includeIf('task.notes-table')
    </section>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    {{-- <script> console.log('Hi!'); </script> --}}
@stop
