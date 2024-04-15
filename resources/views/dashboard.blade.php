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
            @if(count($ideas) === 0)
                <p class="text-center mt-4">No Results Found</p>
            @endif

            @foreach($ideas as $idea)
            <div class="mt-3">
                @include('shared.idea-card')
            </div>
            @endforeach
            <div class="mt-3">
                {{$ideas->withQueryString()->links()}}
            </div>
        </div>
        <div class="col-3">
            @include('shared.search-bar')
            @include('shared.follow-box')
        </div>
    </div>
@endsection



