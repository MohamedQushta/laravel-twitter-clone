<div>
    @auth()
        <form action="{{ route('ideas.comments.store', $idea->id) }}" method="POST">
            @csrf
            <div class="mb-3">
                <textarea name="content" class="fs-6 form-control" rows="1"></textarea>
            </div>
            <div>
                <button type="submit" class="btn btn-primary btn-lg"> Post Comment </button>
            </div>
        </form>
    @endauth
    <hr>
    @forelse ($idea->comments as $comment)
        <div class="d-flex align-items-start">
            <div class="w-100">
                <div class="d-flex justify-content-between">
                    <span class="fs-4"> {{ $comment->user->name }}
                    </span>
                    <small class="fs-6 fw-light text-muted"> {{ $comment->created_at->diffForHumans() }}</small>
                </div>
                <p class="fs-6 mt-3 fw-light">
                    {{ $comment->content }}
                </p>
            </div>
        </div>
        @if ($comment != $idea->comments->last())
        <hr>
        @endif
    @empty
        <h4 style="text-align: center;">No comments yet</h4>
    @endforelse
</div>
