<?php

namespace App\Http\Controllers;

use App\Category;
use App\Setting;
use App\Post;
use App\Tag;
use App\Comment;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index')
                ->with('title',Setting::first()->site_name)
                ->with('categories',Category::take(5)->get())
                ->with('first_post',Post::orderBy('created_at','desc')->first())
                ->with('second_post',Post::orderBy('created_at','desc')->skip(1)->take(1)->get()->first())
                ->with('third_post',Post::orderBy('created_at','desc')->skip(2)->take(1)->get()->first())
                ->with('career',Category::find(5))
                ->with('tutorials',Category::find(4))
                ->with('settings',Setting::first());
    }

    public function singlePost($slug) {
        $post = Post::where('slug',$slug)->first();

        $next_id = Post::where('id','>',$post->id)->min('id');
        $prev_id = Post::where('id','<',$post->id)->max('id');

        return view('single')->with('post',$post)
                            ->with('title',$post->title)
                            ->with('settings',Setting::first())                            
                            ->with('categories',Category::take(5)->get())
                            ->with('next',Post::find($next_id))
                            ->with('prev',Post::find($prev_id))
                            ->with('tags',Tag::all());    
    }

    public function category($id) {
        $category = Category::find($id); 

        return view('category')->with('category',$category)
                                ->with('title',$category->name)
                                ->with('settings',Setting::first())                            
                                ->with('categories',Category::take(5)->get());
    }

    public function tag($id) {
        $tag = Tag::find($id);

        return view('tag')->with('tag',$tag)
                            ->with('title',$tag->name)
                            ->with('settings',Setting::first())                            
                            ->with('categories',Category::take(5)->get());
    }


    // public function search($query) {
    //     $posts = \App\Post::where('title','like', '%' . request($query) . '%')->get();

    //     return view('results')->with('posts',$posts)
    //                         ->with('title','Search results : ' . request('query'))
    //                         ->with('settings', \App\Setting::first())                            
    //                         ->with('categories', \App\Category::take(5)->get())
    //                         ->with('query',request('query'));

    // }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
