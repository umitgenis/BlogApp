<x-layouts.site title="Create Post">

    <div class="container">
        <div class="row g-4">
            <div class="col-lg-4 col-sm-12 bg-cover overflow-auto d-inline-flex justify-content-center align-items-center" style="min-height: 300px;">
                <img id="imageUploadPreview"/>
            </div>
            <div class="col-lg-8 mb-2">
                <form enctype="multipart/form-data" action="{{route('create.store')}}" method="POST"
                      class="row p-lg-5 g-3">
                    @csrf
                    <div class="col-12">
                        <h1>Yeni bir blog yazısı oluşturabilirsiniz...</h1>
                        <p>(*) İşaretli alanlarının doldurulması zorunludur.</p>
                    </div>
                    <div class="col-lg-12">
                        <label for="title" class="form-label">Title (*) </label>
                        <input type="text" value="{{old('title')}}" name="title" class="form-control" id="title"
                               placeholder="Example title...">
                        @error('title')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label for="image" class="form-label">Image (*) </label>
                        <input type="file" name="photo" class="form-control" id="image" onchange="loadFilePreview(event)">
                        @error('photo')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label for="content" class="form-label">Content (*) </label>
                        <textarea class="form-control" name="content" id="content" rows="3"
                                  placeholder="Example content...">{{old('content')}}</textarea>
                        @error('content')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <!-- <div class="col-12 col-auto float-end"> -->
                    <div class="col-12 model-final">

                        <a href="{{url('/')}}">
                            <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">
                                Close
                            </button>
                        </a>

                        <button type="submit" class="btn btn-brand">Send Post</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


</x-layouts.site>
