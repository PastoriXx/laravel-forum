{!! Form::open([ 'url' => route('posts.comment', ['id' => $model->id]), 'method' => 'POST']) !!}
    <div class="form-group">
        {!! Form::textarea('message', null, 
            ['class' => 'form-control', 'placeholder' => 'Add comment...', 'required' => true, 'rows' => 5]) 
        !!}
    </div>

    <div class="pull-right">
	    {!! Form::submit('Send', ['class' => 'btn btn-primary']) !!}
    </div>
{!! Form::close() !!}