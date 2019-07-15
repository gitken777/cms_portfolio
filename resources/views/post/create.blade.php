@extends('layouts.app')
@section('content')
<div class="card p-2">
    <h5 id="head" class="card-header mb-3 text-white">投稿</h5>
    <form action="/post/store" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">タイトル</label>
            <input type="text" class="form-control" name="title" id="title">
        </div>
        <div class="form-group">
            <label for="description">詳細</label>
            <textarea name="description" id="description" cols="2" rows="2" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="description">コンテンツ</label>
            <input id="content" type="hidden" name="content">
            <trix-editor input="content"></trix-editor>
        </div>
        <div class="form-group">
            <label for="image">画像</label>
            <input type="file" class="form-control" name="image" id="image">
        </div>

        <div class="form-group">
            <label for="category">カテゴリー</label>
            <select name="category" id="category" class="form-control">
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        @if($tags->count() > 0)
        <div class="form-group">
            <label for="tags">タグ</label>
                <select name="tags[]" id="tags" class="form-control tags-selector" multiple>
                    @foreach($tags as $tag)
                        <option value="{{$tag->id}}">{{$tag->name}}</option>
                    @endforeach
                </select>
        </div>
        @endif


        <div class="form-group">
            <label for="published_at">投稿日</label>
            <input type="text" class="form-control" name="published_at" id="published_at">

        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">投稿する</button>
        </div>



    </form>
</div>
@endsection



{{----- Trix Editor -----}}
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.1.1/trix.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
    <script>
        flatpickr('#published_at',{
            enableTime: true
        })

        $(document).ready(function() {
            $('.tags-selector').select2();
        })
    </script>
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.1.1/trix.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
@endsection