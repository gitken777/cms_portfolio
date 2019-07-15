@extends('layouts.app')
@section('content')
    <div class="card p-3">
        <form action="/category/{{$categories->id}}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">カテゴリー名</label>
                <input type="text" class="form-control" name="name" id="name" value="{{$categories->name}}">
            </div>

                <button type="submit" class="btn btn-primary">アップデート</button>
            </form>
    </div>
@endsection