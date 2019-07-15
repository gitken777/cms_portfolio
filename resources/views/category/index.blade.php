@extends('layouts.app')
@section('content')
@if($categories->count() > 0)
    <table class="table">
        <thead id="head">
        <tr>
            <th class="text-white" scope="col">カテゴリー名</th>

            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
        <tr>
            <td>{{$category->name}}</td>

            <td><a href="category/{{$category->id}}/edit" class="btn btn-info">編集</a></td>
            <td><form action="category/{{$category->id}}" method="POST">
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
        <div class="card-header">カテゴリー</div>
        <h3 class="text-center p-3">カテゴリーがありません。</h3>
    </div>
@endif
    <a href="/category/create" class="btn btn-primary btn-lg">カテゴリー追加</a>

@endsection