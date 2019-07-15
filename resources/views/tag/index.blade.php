@extends('layouts.app')
@section('content')
@if($tags->count() > 0)
    <table class="table">
        <thead id="head">
        <tr>
            <th class="text-white" scope="col">タグ名</th>
            <th class="text-white" scope="col">ポスト数</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($tags as $tag)
            <tr>
                <td>{{$tag->name}}</td>
                <td>{{$tag->posts->count()}}</td>
                <td><a href="tag/{{$tag->id}}/edit" class="btn btn-info">編集</a></td>
                <td><form action="tag/{{$tag->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">削除</button>
                    </form></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @else
        <div class="card mb-3">
            <div class="card-header">タグ</div>
            <h3 class="text-center p-3">タグがありません。</h3>
        </div>
@endif
    <a href="tag/create" class="btn btn-primary btn-lg">タグ追加</a>

@endsection