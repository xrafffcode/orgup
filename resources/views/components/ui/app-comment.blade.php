<div class="card mt-3 {{ $comment->parent_id ? 'comment-reply' : 'comment' }}">
    <div class="card-body">
        <h5 class="card-title">
            <a href="#">{{ $comment->student->name }}</a>
        </h5>
        <p class="card-text">{{ $comment->comment }}</p>

    </div>
</div>

@foreach ($comment->replies as $reply)
    <x-ui.app-comment :comment="$reply" />
@endforeach
