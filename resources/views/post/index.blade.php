@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="pull-right">
                        <a class="btn btn-xs btn-success" href="{{ route('posts.create') }}">
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                            Create post
                        </a>
                    </div>

                    <h4>Dashboard</h4>
                </div>

                <div class="panel-body">

                    <div class="list-group">
                        @foreach($posts as $post)
                            <a class="list-group-item" href="{{ route('posts.show', ['id' => $post->id]) }}">
                                <h4 class="list-group-item-heading">
                                    {{ $post->name }}
                                    {{-- <span class="badge">14</span> --}}
                                </h4>
                                <p class="list-group-item-text">{{ $post->created_at }}</p>
                            </a>
                        @endforeach
                    </div>

                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
