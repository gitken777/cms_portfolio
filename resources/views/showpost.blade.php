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
                        <div class="row gap-y justify-content-center">
                            <div class="row">
                            <img class="col-12 mb-3" width="500px" src="{{asset($posts->image)}}" alt=""></div>
                        </div>

{{--                        <div class="row">--}}
{{--                            <a class="badge badge-pill badge-info" href="/blog/categories/{{$posts->categories->id}}">{{$posts->categories->name}}</a>--}}
{{--                        </div>--}}

                        <div class="row">
                            <a class="badge badge-pill badge-primary" href="/blog/categories/{{$posts->categories->id}}">{{$posts->categories->name}}&nbsp;<span class="badge badge-light">{{$posts->categories->posts->count()}}</span></a>
                        </div>
                        <div class="row">
                            <div class="gap-xy-2">
                                @foreach($posts->tags as $tag)
                                    <a class="badge badge-pill badge-success" href="/blog/tags/{{$tag->id}}">{{$tag->name}}</a>
                                @endforeach
                            </div>
                        </div>

                        <div class="row gap-y justify-content-center mt-3 mb-5">
                            {{$posts->description}}
                        </div>











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
                                    <a class="badge badge-success" href="/blog/tags/{{$tag->id}}">{{$tag->name}}</a>
                                @endforeach

                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </main>











@endsection