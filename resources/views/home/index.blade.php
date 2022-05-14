<x-layouts.site title="Latest Posts">
    <!-- BLOG START-->
    <section class="pt-sm-3" id="blog">
        <div class="container">
            <div>
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
            </div>
            <div class="row">
                <div class="col-12 intro text-center mb-0">
                    <h6 class="text-uppercase">[ Lastest Posts ]</h6>
                    <p>Tüm postlar aşağıda Listelenmektedir. İlgili postun başlığına tıklayarak detayına ulaşabilirsiniz.</p>
                </div>
            </div>
            <div class="row">

                @foreach($posts as $key => $value)
                <div class="col-md-4">
                    <div class="blog-post lastest my-sm-3  mx-sm-2">
                        <img src={{asset($value['cover_photo_path'])}} alt="cover_photo_path">
                        <div class="content" style="min-height: 300px; max-height: 400px; overflow: hidden; margin-bottom: 10px" >
                            <small>{{$value->created_at->format('d F Y H:i:s')}}</small>
                            <h6><i class='bx bx-link-alt'></i> <a href="{{route('detail',$value['id'])}}" >{{$value['title']}}</a></h6>
                            <p>{{$value['content']}}</p>
                            <span><a href="{{route('profile',$value->user->id)}}">{{$value->user->name}}</a></span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="mt-md-3">
                {{ $posts->links() }}
            </div>
        </div>
    </section>
    <!-- BLOG END -->
</x-layouts.site>
