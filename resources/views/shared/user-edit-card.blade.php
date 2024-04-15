<div class="card">
    <div class="px-3 pt-4 pb-2">
        <form enctype="multipart/form-data" action="{{route('users.update', $user->id)}}" method="POST">
            @csrf
            @method('put')
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <img style="width:100px" class="me-3 avatar-sm rounded-circle"
                         src="{{$user->getImageURL()}}" alt="Mario Avatar">
                    <div>
                            <input name="name" value="{{$user->name}}" type="text" class="form-control form-control-sm">
                            @error('name')
                            <span class="fs-6 text-danger mt-2"> {{$message}}</span>
                            @enderror
                    </div>
                </div>
                <div>
                    @auth()
                        @if(auth()->id() === $user->id)
                            <a href="{{route('users.show', $user->id)}}">View</a>
                        @endif
                    @endauth
                </div>
            </div>
                <div class="mt-3">
                    <label for="image">Profile picture</label>
                    <input name="image" class="form-control" type="file">
                </div>
            <div class="px-2 mt-4">
                <h5 class="fs-5"> Bio : </h5>
                    <textarea name="bio" class="form-control" id="bio" rows="3">{{$user->bio}}</textarea>
                    @error('bio')
                    <span class="fs-6 text-danger mt-2"> {{$message}}</span>
                    @enderror
                    <button class="btn btn-dark btn-sm mt-1 mb-2">Save</button>
                <div class="d-flex justify-content-start">
                    <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-user me-1">
                                        </span> 0 Followers </a>
                    <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-brain me-1">
                                        </span> {{$user->ideas()->count()}} </a>
                    <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-comment me-1">
                                        </span> {{$user->comments()->count()}} </a>
                </div>
                @auth()
                    @if(auth()->id() !== $user->id)
                        <div class="mt-3">
                            <button class="btn btn-primary btn-sm"> Follow </button>
                        </div>
                    @endif
                @endauth
            </div>
        </form>
    </div>
</div>
