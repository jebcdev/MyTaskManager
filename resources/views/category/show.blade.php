@extends('adminlte::page')

@section('title')
	{{ config('app.name') }}
@stop

@section('content_header')
<div class="row align-items-center">
    <div class="col-6 d-flex">
        <h1 class="me-auto">
            <span class="card-title">{{ __('Show') }} {{__('Category')}}</span>
        </h1>
    </div>
    <div class="col-6 d-flex justify-content-end">
        <a href="{{ route('categories.index') }}" class="btn btn-sm btn-primary">
            {{__('Back')}}
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
                                    <strong>{{__('Name')}}:</strong>
                                    {{ $category->name }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>{{__('Description')}}:</strong>
                                    {{ $category->description }}
                                </div>

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
    