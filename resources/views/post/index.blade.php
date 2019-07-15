@extends('layouts.app')

@section('content')
    @if($posts->count() > 0)
    <table class="table">
        <thead id="head">
        <tr>
            <th class="text-white" scope="col">ポスト名</th>

            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr>
                <td>{{$post->title}}</td>

                <td><a href="post/{{$post->id}}/edit" class="btn btn-info">編集</a></td>

                <td><form action="post/{{$post->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">ごみ箱に入れる</button>
                    </form></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @else
        <div class="card mb-3">
            <div class="card-header">ポスト</div>
            <h3 class="text-center p-3">ポストがありません。</h3>
        </div>
        @endif
    <a href="/post/create" class="btn btn-primary btn-lg">ポスト追加</a>

@endsection