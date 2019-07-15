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
                <td>
                    <form action="/restore/{{$post->id}}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-info text-white">復元する</button>
                    </form>
                </td>



                <td><form action="post/{{$post->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                           {{$post->trashed() ? '完全に削除する':'ゴミ箱に入れる'}}
                        </button>
                    </form></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @else
    <div class="card">
        <div class="card-header">ゴミ箱</div>
        <h3 class="text-center p-3">ゴミ箱は空です。</h3>
    </div>
@endif
@endsection