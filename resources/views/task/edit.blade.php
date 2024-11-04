@extends('adminlte::page')

@section('title')
	{{ config('app.name') }}
@stop

@section('content_header')
<div class="row align-items-center">
    <div class="col-6 d-flex">
        <h1 class="me-auto">
            <span class="card-title">{{ __('Update') }} {{__('Task')}}</span>
        </h1>
    </div>
    <div class="col-6 d-flex justify-content-end">
        <a href="{{ route('tasks.index') }}" class="btn btn-sm btn-primary">
            {{__('Back')}}
        </a>
    </div>
</div>
@stop

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default">

                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('tasks.update', $task->id) }}" role="form"
                            enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('task.form')

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
