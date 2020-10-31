<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('category')->get();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $category = Category::pluck('name', 'id');

        return view('posts.create', compact('category_id', 'category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());


        $rules      = [ 
                        'title'         => 'required',
                        'img'           => 'required', 
                        'content'       => 'required', 
                        'category_id'   => 'required'  
                    ];
        $massage    = [
                        'title.required'         => 'title Is Requireds',
                        'img.required'           => 'img Is Requireds', 
                        'content.required'       => 'content Is Requireds', 
                        'category_id.required'   => 'category_id Is Requireds'  
                    ];
        $this->validate($request, $rules, $massage);

        if($request->hasFile('img'))
        {
            $file  = $request->file('img');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/images/posts/', $name);
        }

        //$post = Post::create($request->all());
        $post = new Post();
        $post->title        = $request->get('title');
        $post->img          = $name;
        $post->content      = $request->get('content');
        $post->category_id  = $request->get('category_id');
        $post->save();
        flash('Success create New Post')->success();
        return redirect('post'); //return back();


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
        $model = Post::findOrFail($id);
        $categories = Post::with('category')->get();
        foreach($categories as $category)
        {
            $categoriesArray[$category->category_id] = $category->category->name;
        }

        //dd($model);
        return view('posts.edit', compact('model','categoriesArray'));
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
        $post = Post::findOrFail($id);

        $name = '';

        if($request->hasFile('img'))
        {
            $file  = $request->file('img');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/images/posts/', $name);
        }

        $post->title        = $request->get('title');
        $post->content      = $request->get('content');
        $post->category_id  = $request->get('category_id');

        if(strlen($name) > 0 )
            $post->img = $name;
        $post->save();


        flash('Success Update Post')->success();
        return redirect('post'); //return back();


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        flash('Success Delete Post')->success();
        return redirect('post'); //return back();

    }
}
