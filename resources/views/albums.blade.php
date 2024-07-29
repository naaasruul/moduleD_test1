@include('commons.loggedIn-header')
<h1>Album page</h1>
<div class="d-flex gap-2 flex-wrap">


    @foreach($albums as $album)
    <div class="card bg-light text-center mt-3 w-25">
        <a href="{{route('manage-album',['album_id'=>$album->id])}}">
            @if($album->thumbnail_url != '')
            <img class="img-fluid" src="{{asset($album->thumbnail_url)}}" alt="">
            @else
            <div style="height:5px;"></div>
            @endif
            <div class="card-body">
                <h2>{{$album->title}}</h2>
            </div>
        </a>
    </div>
    @endforeach
    <div class="card bg-light text-center mt-3 p-3 w-25" data-bs-target='#uploadAlbum' data-bs-toggle="modal">
        <h1>+</h1>
    </div>
</div>

<div class="modal" id="uploadAlbum">
    <div class="modal-dialog">
        <div class="modal-content p-5">
            <h3>Add New Album</h3>
            <form method="post" action="{{route('addAlbum')}}">
                @csrf
                <div class="mb-3">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="status">Status</label>
                    <select class="form-select" name="status" id="status">
                        <option value="0">Public</option>
                        <option value="1">Private</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
                <button type="reset" data-bs-toggle="modal" class="btn btn-secondary">Reset</button>
            </form>
        </div>
    </div>
</div>