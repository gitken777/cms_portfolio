@extends('layouts.app')
@section('content')
    <div class="card p-3">
        <form action="/tag/{{$tag->id}}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">タグ名</label>
                <input type="text" class="form-control" name="name" id="name" value="{{$tag->name}}">
            </div>

            <button type="submit" class="btn btn-primary">アップデート</button>
        </form>
    </div>
@endsection