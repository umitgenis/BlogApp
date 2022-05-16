<x-layouts.site title="Update Post">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-4 col-sm-12 bg-cover"
                 style="background-image: url({{asset($post->cover_photo_path)}}); min-height: 300px;">
            </div>
            <div class="col-lg-8 mb-3">
                <form enctype="multipart/form-data" action="{{route('update',['id'=>$post->id])}}" method="POST" class="row p-lg-5 g-3">
                    @csrf
                    <div class="col-12">
                        <h1>Blog yazınızı düzenleyebilirsiniz.</h1>
                        <p>Başlık ve içerik kısımlarının doldurulması zorunludur.</p>
                    </div>
                    <div class="col-lg-12">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" value="{{$post->title}}" name="title" class="form-control" id="title" placeholder="Example title...">
                        @error('title')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" name="image" class="form-control" id="image">
                        @error('photo')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label for="content" class="form-label">Content</label>
                        <textarea class="form-control" name="content" id="content" rows="3"
                                  placeholder="Example content...">{{$post->content}}</textarea>
                        @error('content')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <!-- <div class="col-12 col-auto float-end"> -->
                    <div class="col-12 model-final">

                        <a href="{{route('detail',['id'=>$post->id])}}">
                            <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">
                                Close
                            </button>
                        </a>

                        <button type="submit" class="btn btn-brand">Update Post</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


</x-layouts.site>
