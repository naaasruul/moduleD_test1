@include('commons.loggedIn-header')
<style>
    .uploadBorder {
        border: 3px black solid;
    }
</style>
<h1>Manage Album page</h1>
<form action="">
    <div class="mb-3">
        <label for="title">Title</label>
        <input type="text" class="form-control" name="title">
    </div>

    <div class="mb-3">
        <label for="status">Status</label>
        <select name="status" class="form-select" id="status">
            <option value="0">Public</option>
            <option value="1">Private</option>
        </select>
    </div>

    <button class="btn btn-primary" type="submit">Update</button>
    <button class="btn btn-secondary" type="reset">Reset</button>
</form>
<hr>
<div id="row" class="row">
    @foreach($albums->photos as $photo)
    <div class="card col-4 uploadPhoto bg-light text-center mt-3  " data-bs-target='#uploadAlbum' data-bs-toggle="modal">
        <img class="img-fluid" src="{{asset('storage/'.$photo->url)}}" alt="">
    </div>
    @endforeach
    <div class="card col-4 uploadPhoto bg-light text-center mt-3 p-3" data-bs-target='#uploadAlbum' data-bs-toggle="modal">
        <h1>+</h1>
    </div>
</div>

<script>
    $(function() {
        $('.uploadPhoto').on('dragover', function(e) {
            e.preventDefault()
            $(this).addClass('uploadBorder')
        })

        $('.uploadPhoto').on('dragleave', function(e) {
            e.preventDefault()
            $(this).removeClass('uploadBorder')
        })

        $('.uploadPhoto').on('drop', function(e) {
            e.preventDefault()
            var files = e.originalEvent.dataTransfer.files
            console.log(files)
            if (files.length > 0) {
                uploadPhoto(files[0])
            }
        })

        function uploadPhoto(files) {
            const formData = new FormData()
            formData.append('file', files)

            $.ajax({
                type: "POST",
                url: `/upload-photo/{{$albums->id}}`,
                contentType: false,
                processData: false,
                data: formData,
                headers: {
                    'X-CSRF-TOKEN': '{{csrf_token()}}'
                },
                success: function(response) {
                    if (response.success) {
                        var col = $('<div>').addClass('card col-4 uploadPhoto bg-light text-center mt-3 w-25')
                        var img = $('<img>').attr('src',response.url) 

                        //                     <div class="card col-3 uploadPhoto bg-light text-center mt-3 p-3 w-25" data-bs-target='#uploadAlbum' data-bs-toggle="modal">
                        //     <img src="{{asset('storage/ '.$photo->url)}}" alt="">
                        // </div>
                        $("#row").children(':last-child').before(col.append(img))
                    } else {
                        console.log('something wrong with uploading')
                    }
                }
            });
        }
    })
</script>