@extends('adminlte::page')

@section('title')
    {{ config('app.name') }}
@stop

@section('content_header')
    <div class="row align-items-center">
        <div class="col-6 d-flex">
            <h1 class="me-auto">
                <span class="card-title">{{ __('Create') }} {{ __('Note') }}</span>
            </h1>
        </div>
        <div class="col-6 d-flex justify-content-end">
            <a href="{{ route('notes.index') }}" class="btn btn-sm btn-primary">
                {{ __('Back') }}
            </a>
        </div>
    </div>
@stop

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('notes.store') }}" role="form"
                            enctype="multipart/form-data">
                            @csrf

                            @include('note.form')

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
