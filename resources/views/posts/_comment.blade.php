<div class="comment">
    <strong>{{ $comment->author_name }}</strong>
    <p>{{ $comment->body }}</p>
    <small>{{ $comment->created_at->diffForHumans() }}</small>
</div>
