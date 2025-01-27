@auth()
<div class="row">
    <h4> Share your ideas </h4>
    <form action="{{route('idea.create')}}" method="post">
        @csrf
        <div class="mb-3">
            <textarea name="content" class="form-control" id="content" rows="3"></textarea>
            @error('content')
                <span class="fs-6 text-danger mt-2"> {{$message}}</span>
            @enderror
        </div>
        <div class="">
            <button type="submit" class="btn btn-dark"> Share </button>
        </div>
    </form>
</div>
@endauth

@guest()
    <h4>Login to share your ideas</h4>
@endguest
