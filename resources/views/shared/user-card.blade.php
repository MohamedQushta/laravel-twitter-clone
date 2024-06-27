<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:150px" class="me-3 avatar-sm rounded-circle"
                    src="https://api.dicebear.com/6.x/fun-emoji/svg?seed=Mario" alt="Mario Avatar">
                <div>
                    @if ($editing ?? false)
                        <input value="{{ $user->name }}" type="text" class="form-control">
                    @else
                        <h3 class="card-title mb-0"><a href="#"> {{ $user->name }}
                            </a></h3>
                        <span class="fs-6 text-muted">{{ $user->email }}</span>
                    @endif
                </div>
            </div>
            @auth
                @if (Auth::id() == $user->id)
                    <div>
                        <a href="{{ route('users.edit', $user->id) }}">Edit</a>
                    </div>
                @endif
            @endauth
        </div>
        <div class="px-2 mt-4">
            <h5 class="fs-5"> Bio </h5>
            @if ($editing ?? false)
                <div class="mb-3">
                    <textarea name="bio" class="form-control" id="content" rows="3"></textarea>
                    @error('bio')
                        <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                    @enderror
                </div>
                <button class="btn btn-dark btn-small mb-3">Save</button>
            @else
                <p class="fs-6 fw-light">
                    This book is a treatise on the theory of ethics, very popular during the
                    Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes
                    from a line in section 1.10.32.
                </p>
            @endif
            <div class="d-flex justify-content-start">
                <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-user me-1">
                    </span> 120 Followers </a>
                <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-brain me-1">
                    </span> {{ $user->ideas()->count() }} </a>
                <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-comment me-1">
                    </span> {{ $user->comments()->count() }} </a>
            </div>
            @auth()
                @if (Auth::id() !== $user->id)
                    <div class="mt-3">
                        @if (Auth::user()->follows($user))
                            <form method="POST" action="{{ route('users.unfollow', $user->id) }}">
                                @csrf
                                <button type="submit" class="btn-danger btn-primary btn-sm"> Unfollow </button>
                            </form>
                        @else
                            <form method="POST" action="{{ route('users.follow', $user->id) }}">
                                @csrf
                                <button type="submit" class="btn btn-primary btn-sm"> Follow </button>
                            </form>
                        @endif
                    </div>
                @endif
            @endauth
        </div>
    </div>
    @if (count($ideas) > 0)
        @foreach ($ideas as $idea)
            <div class="mt-3">
                @include('shared.idea-card')
            </div>
        @endforeach
    @else
        <h4>No ideas found</h4>
    @endif
    <div class="mt-2"></div>
    {{ $ideas->withQueryString()->links('pagination::bootstrap-4') }}
</div>
<hr>
