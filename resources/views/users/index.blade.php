@extends('layouts.app')

@section('content')
    @if($users->count() > 0)
        <table class="table">
            <thead id="head">
            <tr>
                <th class="text-white" scope="col">画像</th>

                <th class="text-white" scope="col">ユーザー名</th>
                <th class="text-white" scope="col">詳細</th>
                <th></th>


            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td><img width="40px" height="40px" style="border-radius:50%;" src="{{Gravatar::src($user->email)}}" alt=""></td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->about}}</td>
                    <td>
                        @if(!$user->isAdmin())
                            <form action="/users/{{$user->id}}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">管理者権限を与える</button>
                            </form>
                            @endif
                    </td>


                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <div class="card mb-3">
            <div class="card-header">ユーザー</div>
            <h3 class="text-center p-3">ユーザーがまだいません。</h3>
        </div>
    @endif


@endsection