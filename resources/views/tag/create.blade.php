@extends('layouts.app')
@section('content')
    <div class="card p-3">
        <form action="/tag/store" method="POST">@csrf
            <div class="form-group">
                <label for="name">タグ名</label>
                <input type="text" class="form-control" name="name" id="name">
            </div>
            <button type="submit" class="btn btn-primary">タグ追加</button>
        </form>
    </div>
@endsection