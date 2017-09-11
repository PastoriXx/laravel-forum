@extends('layouts.app')

@section('content_title')
    Edit post
@endsection

@section('content')

@include('layouts._breadcrumb')

<div class="panel panel-default">
    <div class="panel-heading">
        <div class="pull-right">
            {{ Form::open([
                'method' => 'DELETE', 'route' => ['posts.destroy', $model->id], 
                'style' => 'display:inline',
                'onsubmit' => 'return confirm("Are you sure you want to delete this post?")'
            ]) }}
                <button class="btn btn-xs btn-danger" title="Delete post">
                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                </button>
            {{ Form::close() }}
        </div>
        
        <h4>Edit post</h4>
    </div>

    <div class="panel-body">
        @include('post._form', ['model' => $model])
    </div>
    
</div>

@endsection
