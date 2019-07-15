@extends('layouts.front')
@section('content')


    <section id="showcase">



        <div id="overlay"></div>
        <div id="header" class="container text-white text-center">
            <div id="text">
                <h2 class="mt-5">管理画面にログインお願い致します。</h2>
                <p class="lead mt-4">MAIL:example@gmail.com　PW:exampleでログインできます。</p>
                <button class="btn btn-success">ログインはこちら</button>
            </div>
        </div>
    </section>

    <main class="main-content mt-5">
        <div class="section bg-gray">
            <div class="container">
                <div class="row">

                    <div class="col-md-8 col-xl-9">
                        <div class="row gap-y">


                            @foreach($posts as $post)
                                <div class="col-md-6">
                                    <div class="card border hover-shadow-6 mb-6 d-block mb-3">

                                        <a href="/show/{{$post->id}}"><img class="card-img-top" src="{{asset($post->image)}}" alt="Card Image cap"></a>
                                        <div class="p-6 text-center">

                                            <p><a class="small-5 text-lighter text-uppercase ls-2 fw-400" href="#">{{$post->categories->name}}</a></p>
                                            <h5 class="mb-0"><a class="text-dark" href="/show/{{$post->id}}">{{$post->title}}</a></h5>
                                        </div>
                                    </div>
                                </div>

                            @endforeach

                        </div>

                        <div class="mt-2 mb-1">{{$posts->links()}}</div>

                    </div>





                    <div class="col-md-4 col-xl-3">
                        <div class="sidebar px-4 py-md-0">





                            <h6 class="sidebar-title mt-5">カテゴリー</h6>
                            <div class="row link-color-default fs-14 lh-24">

                                @foreach($categories as $category)
                                    <div class="col-6"><a href="/blog/categories/{{$category->id}}">{{$category->name}}</a></div>
                                @endforeach
                            </div>



                            <h6 class="sidebar-title mt-5">タグ</h6>
                            <div class="gap-multiline-items-1">
                                @foreach($tags as $tag)
                                    <a class="badge badge-primary" href="/blog/tags/{{$tag->id}}">{{$tag->name}}</a>
                                @endforeach

                            </div>


                        </div>
                    </div>







                </div>
            </div>
        </div>
    </main>







@endsection