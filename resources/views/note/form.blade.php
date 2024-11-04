<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="task_id" class="form-label">{{ __('Task') }}</label>

            <select name="task_id" class="form-control @error('task_id') is-invalid @enderror" id="task_id">
                <option value="">Select Task</option>
                @foreach($tasks as $task)
                    <option value="{{ $task->id }}" {{ old('task_id', $note?->task_id) == $task->id ? 'selected' : '' }}>{{ $task->name }}</option>
                @endforeach
            </select>

            
            {!! $errors->first('task_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="content" class="form-label">{{ __('Content') }}</label>
            <input type="text" name="content" class="form-control @error('content') is-invalid @enderror" value="{{ old('content', $note?->content) }}" id="content" placeholder="Content">
            {!! $errors->first('content', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>