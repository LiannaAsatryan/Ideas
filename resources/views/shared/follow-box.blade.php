<div class="card mt-3">
    <div class="card-header pb-0 border-0">
        <h5 class="">Top Users</h5>
    </div>
    <div class="card-body">
        @foreach($topUsers as $user)
        <div class="hstack gap-2 mb-3">
            <div class="avatar">
                <a href="{{route('users.show', $user->id)}}"><img style="width: 25px" class="avatar-img rounded-circle"
                                  src="{{$user->getImageURL()}}" alt=""></a>
            </div>
            <div class="overflow-hidden">
                <a style="font-size: 10px" class="mb-0" href="{{route('users.show', $user->id)}}">{{$user->name}}</a>
                <p style="font-size: 7px" class="mb-0 small text-truncate">@ {{$user->email}}</p>
            </div>
{{--            <a class="btn btn-primary-soft rounded-circle icon-md ms-auto" href="#"><i--}}
{{--                    class="fa-solid fa-plus"> </i></a>--}}
        </div>
        @endforeach

</div>