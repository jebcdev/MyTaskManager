
@extends('adminlte::page')

@section('title')
	{{ config('app.name') }}
@stop

@section('content_header')
<div style="display: flex; justify-content: space-between; align-items: center;">

    <span id="card_title">
        {{ __('Statuses') }}
    </span>

     <div class="float-right">
        <a href="{{ route('statuses.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
          {{ __('Create New') }}
        </a>
      </div>
</div>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
									<th >{{__('Name')}}</th>
									<th >{{__('Description')}}</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($statuses as $status)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $status->name }}</td>
										<td >{{ $status->description }}</td>

                                            <td>
                                                <form action="{{ route('statuses.destroy', $status->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('statuses.show', $status->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('statuses.edit', $status->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('Are you sure to delete?') ? this.closest('form').submit() : false;"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $statuses->withQueryString()->links() !!}
            </div>
        </div>
    </div>
    @stop

    @section('css')
        {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    @stop
    
    @section('js')
        {{-- <script> console.log('Hi!'); </script> --}}
    @stop