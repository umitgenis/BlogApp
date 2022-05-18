<x-layouts.site title="Profil Page">
    <!-- PROFİL START-->
    <section id="blog">
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

                <div class="col-12 intro text-center">
                    @auth()
                        @if($user->id != Auth::user()->id)
                                <h6 class="text-capitalize">[ {{$user->name}} Ait Tüm Postlardır ]</h6>
                                <p>{{$user->name}} adlı kullanıcının tüm postları aşağıda listelenmektedir.</p>
                        @endif
                        @if($user->id == Auth::user()->id)
                            <h6>[ Tüm Postlarınız ]</h6>
                            <p>Tüm postlar aşağıda listelenmektedir.</p>
                        @endif
                    @endauth
                </div>

            </div>
            <div class="row">
                @foreach($user_posts as $key => $value)
                <div class="col-md-6">
                    <div class="blog-post fastest my-sm-3  mx-sm-2" >
                        <img src={{asset($value['cover_photo_path'])}} alt="cover_photo_path" class="img-fluid">
                        <div class="content">
                            <small>{{$value->created_at->format('d/m/Y H:i:s')}}</small>
                            <h6><i class='bx bx-link-alt'></i> <a href="{{route('detail',$value['id'])}}">{{$value['title']}}</a></h6>
                            <p>{{$value['content']}}</p>
                            <span>
                                <a href="{{route('profile',$value->user->id)}}">{{$value->user->name}}</a>
                            </span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="mt-md-3">
                {{ $user_posts->links() }}
            </div>

        </div>
    </section>
    <!-- PROFİL END -->

</x-layouts.site>
