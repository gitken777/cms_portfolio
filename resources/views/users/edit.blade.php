@extends('layouts.app')

@section('content')

<div class="card">
<div id="tes" class="card-header">プロフィール</div>
   <div class="card-body">
       <form action="/users/update" method="POST">
           @csrf
           @method('PUT')
           <div class="form-group">
               <label for="name">名前</label>
               <input type="text" class="form-control" name="name" id="name" value="{{$user->name}}">
           </div>
           <div class="form-group">
               <label for="about">詳細</label>
               <textarea name="about" id="about" cols="5" rows="5" class="form-control">{{$user->about}}</textarea>
           </div>
           <button type="submit" class="btn btn-primary">プロフィール更新</button>

       </form>

   </div>
</div>
@endsection
<style>
    #tes{
        background-color:#2EC4B6;
        color:white;
    }
</style>