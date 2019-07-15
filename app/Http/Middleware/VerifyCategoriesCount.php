<?php

namespace App\Http\Middleware;

use App\Categories;
use Closure;

class VerifyCategoriesCount
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if(Categories::all()->count() == 0){
            session()->flash('error','ポストの投稿にはカテゴリーの作成が必要です。');
            return redirect('/post');

        }

        return $next($request);
    }
}
