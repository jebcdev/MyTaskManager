<div class="card-body bg-white">
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="thead">
                <tr>
                    <th>No</th>
                    <th>{{ __('Task') }}</th>
                    <th>{{ __('Content') }}</th>

                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($task->notes as $note)
                    <tr>
                        <td>{{ $note->id }}</td>


                        <td>{{ $note->task->name }}</td>
                        <td>{{ $note->content }}</td>


                        <td>
                            <form action="{{ route('notes.destroy', $note->id) }}" method="POST">
                                <a class="btn btn-sm btn-primary " href="{{ route('notes.show', $note->id) }}"><i
                                        class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                <a class="btn btn-sm btn-success" href="{{ route('notes.edit', $note->id) }}"><i
                                        class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="event.preventDefault(); confirm('Are you sure to delete?') ? this.closest('form').submit() : false;"><i
                                        class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
