@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <div class="panel panel-default">
                <div class="panel-heading">
	                <div class="pull-right">
	                	{{ $model->created_at }}

	                	@can('update-resource', $model)
	                		<a class="btn btn-xs btn-primary" href="{{ route('posts.edit', ['id' => $model->id]) }}" title="Edit post">
	                			<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                Edit post
	                		</a>
                            {{ Form::open([
                                'method' => 'DELETE', 'route' => ['posts.destroy', $model->id], 
                                'style' => 'display:inline',
                                'onsubmit' => 'return confirm("Are you sure you want to delete this post?")'
                            ]) }}
                                <button class="btn btn-xs btn-danger" title="Delete post">
                                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                </button>
                            {{ Form::close() }}
	                	@endcan
	                </div>

	                <h4>{{ $model->name }}</h4>
                </div>

                <div class="panel-body" style="text-overflow: ellipsis;overflow: hidden;">
	                {{ $model->message }}
                </div>
                
            </div>

            @include('comment.index', ['model' => $model, 'comments' => $comments])
        </div>
    </div>
</div>
@endsection
