@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
