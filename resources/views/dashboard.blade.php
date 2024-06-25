@extends('layout.layout')
@section('content')
<div class="row">
    <div class="col-3">
        @include('shared.left-sidebar')
    </div>
    <div class="col-6">
        @include('shared.success-message')
        @include('shared.submit-idea')
        <hr>
        @foreach ($ideas as $idea)
            <div class="mt-3">
            @include('shared.idea-card')
            </div>
        @endforeach
        <div class="mt-2"></div>
        {{ $ideas->links('pagination::bootstrap-4') }}
    </div>
    <div class="col-3">
        @include('shared.search-bar')
        @include('shared.follow-box')
    </div>
</div>
</div>
@endsection

