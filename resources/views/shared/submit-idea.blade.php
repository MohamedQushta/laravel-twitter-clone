<h4> Share yours ideas </h4>
<div class="row">
    {{-- url function adds the base url to the url --}}

    {{--<form action="{{ url('/post') }}" method="post"> --}}

    {{-- this way uses the route name --}}
    <form action="{{ route('idea.create') }}" method="post">
        @csrf
        <div class="mb-3">
            <textarea name="idea" class="form-control" id="idea" rows="3"></textarea>
        </div>
        <div class="">
            <button class="btn btn-dark"> Share </button>
        </div>
    </form>
</div>
