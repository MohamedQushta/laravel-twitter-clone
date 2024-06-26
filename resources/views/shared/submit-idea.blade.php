@auth()
<h4> Share yours ideas </h4>
<div class="row">
    {{-- url function adds the base url to the url --}}

    {{--<form action="{{ url('/post') }}" method="post"> --}}

    {{-- this way uses the route name --}}
    <form action="{{ route('ideas.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <textarea name="content" class="form-control" id="content" rows="3"></textarea>
            @error('content')
                <span class="fs-6 text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="">
            <button class="btn btn-dark mb02"> Save </button>
        </div>
    </form>
</div>
@endauth()
@guest
    <h4>Login to share your Ideas</h4>
@endguest
