<?php

namespace App\Http\Controllers;

use App\Http\Requests\Posts\CreatePostsRequest;
use App\Http\Requests\Posts\UpdatePostsRequest;
use Illuminate\Http\Request;
use App\Categories;
use App\Tag;
use App\Post;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{

    public function __construct(){
        $this->middleware('verifyCategoriesCount')->only(['create','store']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('post.index')->with('posts',Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create')->with('categories',Categories::all())->with('tags',Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostsRequest $request)
    {
        $image = $request->image->store('posts');

        $post = Post::create([
           'title' => $request->title,
           'description' => $request->description,
           'content' => $request->content,
           'image' =>$image,
           'published_at' => $request->published_at,
           'categories_id' => $request->category,
           'user_id' => auth()->user()->id,
        ]);

        if($request->tags){
            $post->tags()->attach($request->tags);
        }

        session()->flash('success','新しい投稿が作成されました。');
        return redirect()->back();
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
    public function edit(Post $post)
    {
        return view('post.edit')->with('post',$post)->with('categories',Categories::all())->with('tags',Tag::all());;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostsRequest $request, Post $post)
    {
        $data = $request->only(['title','description','published_at','content']);
        //check if new image
        if($request->hasFile('image')){
        //upload it
        $image = $request->image->store('posts');

        //delete old one

        Storage::delete($post->image);

        $data['image'] = $image;

        }

        if($request->tags){
            $post->tags()->sync($request->tags);
        }

        $post->update($data);

        session()->flash('success','投稿がアップデートされました。');

        return redirect('/post');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $post = Post::withTrashed()->where('id',$id)->firstOrFail();

        if($post->trashed()){
            $post->forceDelete();
        }else{
            $post->delete();
        }
        session()->flash('success','ポストがごみ箱にいきました。');
        return redirect()->back();
    }

    public function trashed(){
        $trashed = Post::onlyTrashed()->get();
        return view('post.trash')->with('posts',$trashed);
    }

    public function restore($id){
        $post = Post::withTrashed()->where('id',$id)->firstOrFail();
        $post->restore();
        session()->flash('success','ポストが復元されました。');
        return redirect()->back();

    }

    public function category(Categories $categories){
        return view('blog.category')->with('categories',$categories)->with('posts',$categories->posts()->paginate(4))->with('cate',Categories::all())->with('tags',Tag::all());

    }

    public function tag(Tag $tag){
        return view('blog.tag')->with('tag',$tag)->with('categories',Categories::all())->with('tags',Tag::all())->with('posts',$tag->posts()->paginate(4));
    }

}
