{!! Form::open([
	'url' => $model->exists ? route('posts.update', ['id' => $model->id]) : route('posts.store'),
	'method' => $model->exists ? 'PUT' : 'POST'
]) !!}
    <div class="form-group">
        <label for="name" class="control-label">Name</label>
        {!! Form::text('name', $model->name, 
            ['class' => 'form-control', 'placeholder' => 'Name post', 'required' => true]) !!}
    </div>
    <div class="form-group">
        <label for="name" class="control-label">Message</label>
        {!! Form::textarea('message', $model->message, 
            ['class' => 'form-control', 'placeholder' => 'Message', 'required' => true]) 
        !!}
    </div>

    <div class="pull-right">
	    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
		<a href="{{ url('posts') }}" class="btn btn-xs btn-default">Back</a>
    </div>
{!! Form::close() !!}

