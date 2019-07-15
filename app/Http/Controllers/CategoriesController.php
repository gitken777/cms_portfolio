<?php

namespace App\Http\Controllers;

use App\Categories;
use Illuminate\Http\Request;

use App\Http\Requests\Categories\CategoriesCreateRequest;
use App\Http\Requests\Categories\CategoriesUpdateRequest;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     ****/
    public function index()
    {
        return view('category.index')->with('categories',Categories::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoriesCreateRequest $request)
    {
        Categories::create([
            'name' => $request->name,
        ]);
        session()->flash('success','新しいカテゴリーが作成されました。');
        return redirect('/category');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Categories $categories)
    {
        return view('category.edit')->with('categories',$categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoriesUpdateRequest $request, Categories $categories)
    {
        $categories->update([
           'name' => $request->name,
        ]);
        session()->flash('success','カテゴリーがアップデートされました。');

        return redirect('/category');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categories $categories)
    {
        if($categories->posts->count() > 0){
            session()->flash('error','削除しようとしたカテゴリーと関連したポストがある為削除できませんでした。');
            return redirect()->back();
        }


        $categories->delete();
        session()->flash('success','カテゴリーが削除されました。');
        return redirect('/category');
    }
}
