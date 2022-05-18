<x-layouts.site title="Post Detail">
    <section class="pt-sm-3" id="blog">
        <div class="container">
            @if(session('status'))
                <div class="alert alert-primary" role="alert">
                    {{session('status')}}
                </div>
            @endif
            @if(session('status-err'))
                <div class="alert alert-danger" role="alert">
                    {{session('status-err')}}
                </div>
            @endif

            <div class="row">
                <div class="col-md-4">
                    <img style="" src={{asset($detail['cover_photo_path'])}} alt="cover_photo_path">
                </div>
                <div class="col-md-8">
                    <div class="col-sm-12">
                        <div class="blog-post">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row ">
                                        @auth()
                                            @if ($detail->user->id == \Illuminate\Support\Facades\Auth::user()->id)
                                                <div class="col-sm-12 d-inline-flex justify-content-sm-end">
                                                    <div class="p-sm-3 me-sm-1 mt-sm-1">
                                                        <a class="btn btn-control"
                                                           href="{{route('update',['id'=>$detail->id])}}">Edit</a>

                                                        <a class="btn btn-control"
                                                           href="{{route('delete',$detail->id)}}">Delete</a>
                                                    </div>
                                                </div>
                                            @endif
                                        @endauth
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="content">
                                        <h4><a class="btn btn-detail"
                                               href="{{route('profile',$detail->user->id)}}">{{$detail->user->name}}</a></h4>
                                        <small>{{$detail->created_at->format('d/m/Y H:i:s')}}</small>
                                        <h6><a href="#">{{$detail['title']}}</a></h6>
                                        <p>{{$detail['content']}}</p>
                                    </div>
                                </div>

                                    <div class="col-12">
                                        <div class="content px-sm-4 py-sm-1">
                                            @foreach($post_comments as $key => $value)
                                                <span><h5>{{$value->user?->name}}</h5></span>
                                                <small>{{$value->created_at->format('d/m/Y H:i:s')}}</small>
                                                <p>{{$value->comment}}</p>
                                            @endforeach
                                        </div>
                                    </div>
                                @auth()
                                <div class="col-12 ">
                                    <form enctype="multipart/form-data"
                                          action="{{route('commentCreate',['id'=>$detail->id])}}" method="POST"
                                          class="row p-sm-4 g-3">
                                        @csrf
                                        <div class="col-12">
                                            <textarea class="form-control" name="comment" id="comment" rows="3"
                                                      placeholder="You can write a comment...">{{old('comment')}}</textarea>
                                            @error('comment')
                                            <div class="text-danger">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>

                                        <div class="col-12 model-final">
                                            <button type="submit" class="btn btn-brand">Send Comment</button>
                                        </div>
                                    </form>
                                </div>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.site>
