@extends('adminlte::page')

@section('title')
	{{ config('app.name') }}
@stop

@section('content_header')
<div class="row align-items-center">
    <div class="col-6 d-flex">
        <h1 class="me-auto">
            {{__('Dashboard')}}
        </h1>
    </div>
    <div class="col-6 d-flex justify-content-end">
        <a href="{{ route('admin.index') }}" class="btn btn-sm btn-primary">
            {{__('Dashboard')}}
        </a>
    </div>
</div>
@stop

@section('content')
{{__('My Task Manager')}}
@stop

@section('css')
	{{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
	{{-- <script> console.log('Hi!'); </script> --}}
@stop