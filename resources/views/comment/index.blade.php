<div class="list-group">
    @foreach($comments as $comment)
        <div class="list-group-item">
            <h6 class="list-group-item-heading">
                <b>{{ $comment->user->name }}</b>, {{ $comment->created_at }}
            </h6>
            <p class="list-group-item-text">{{ $comment->message }}</p>
        </div>
    @endforeach

    {{ $comments->links() }}

</div>

@include('comment.create', ['model' => $model])