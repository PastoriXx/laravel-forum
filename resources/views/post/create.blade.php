@extends('layouts.app')

@section('content_title')
    Create post
@endsection

@section('content')

<div class="panel panel-default">
    <div class="panel-heading">
        <h4>Create post</h4>
    </div>

    <div class="panel-body">
        @include('post._form', ['model' => $model])
    </div>
</div>

@endsection
