@extends('adminlte::page')

@section('title')
    {{ config('app.name') }}
@stop

@section('content_header')
    <div class="row align-items-center card p-1">

        <h1 class="me-auto">
            {{ __('My Task Manager') }}
        </h1>

    </div>
@stop

@section('content')
    <div class="container">


        {{-- Analitycs --}}


        <div class="container-fluid">
            <h2 class="text-center">
                {{ __('Tasks Analytics') }}
            </h2>

            <hr>


            {{-- Por Categorias --}}
            <div>
                <h1>
                    {{ __('By Categories') }}
                </h1>
                <div class="row">

                    @forelse ($categoriesAnalytics as $categoriesAnalytic)
                        <div class="small-box {{ $categoriesAnalytic['color'] ?? 'bg-info' }} col m-2 p-1">
                            <div class="inner">
                                <h3>{{ $categoriesAnalytic['total'] }}</h3>

                                <p>{{ $categoriesAnalytic['category'] }}</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
                        </div>

                    @empty
                        <div class="alert alert-warning">
                            {{ __('Nothing To Show') }}
                        </div>
                    @endforelse

                </div>
            </div>
            {{-- Por Categorias --}}


            {{-- By Statuses --}}
            <div>
                <h1>
                    {{ __('By Statuses') }}
                </h1>
                <div class="row">

                    @forelse ($statusesAnalytics as $statusesAnalytic)
                        <div class="small-box {{ $statusesAnalytic['color'] ?? 'bg-info' }} col m-2 p-1">
                            <div class="inner">
                                <h3>{{ $statusesAnalytic['total'] }}</h3>

                                <p>{{ $statusesAnalytic['status'] }}</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
                        </div>

                    @empty
                        <div class="alert alert-warning">
                            {{ __('Nothing To Show') }}
                        </div>
                    @endforelse

                </div>
            </div>
            {{-- By Statuses --}}
        </div>

        {{-- Analitycs --}}

    </div>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    {{-- <script> console.log('Hi!'); </script> --}}
@stop
