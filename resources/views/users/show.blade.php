@extends('layout.layout')

@section('content')
    <div class="row">
        <div class="col-3">
            @include('shared.left-sidebar')
        </div>
        <div class="col-6">
            @include('shared.success-message')
            <h4> Share yours ideas </h4>
            <hr>
            <div class="mt-3">
                @include('shared.user-card')
                <hr>
            </div>

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







