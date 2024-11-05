@extends('adminlte::page')

@section('title')
    Add Note to a Task | {{ config('app.name') }}
@stop

@section('content_header')
    <div class="row align-items-center">
        <div class="col-6 d-flex">
            <h1 class="me-auto">
                <span class="card-title">{{ __('Add') }} {{ __('Note') }}</span>
            </h1>
        </div>
        <div class="col-6 d-flex justify-content-end">
            <a href="{{ url()->previous() }}" class="btn btn-sm btn-primary">
                {{ __('Back') }}
            </a>
        </div>

    </div>
@stop

@section('content')
    <section class="content container-fluid bg-dark">
        <div class="row">
            <div class="col-md-12">
                @if ($message = Session::get('success'))
                <div class="alert alert-success m-4">
                    <p>{{ $message }}</p>
                </div>
            @endif
                <div class="card card-default">
                    <div class="card-body bg-dark">
                        <form method="POST" action="{{ route('notes.store') }}" role="form"
                            enctype="multipart/form-data">
                            @csrf

                            @include('task.addnote.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    {{-- <script> console.log('Hi!'); </script> --}}
@stop
