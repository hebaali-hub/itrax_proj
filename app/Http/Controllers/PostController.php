<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;

use Illuminate\Database\Eloquent\Collection;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       $posts =Post::all();
       return view('posts.index',['posts'=>$posts]);
    }

    // soft delete
    public function softdel()
    {
        $posts = Post::onlyTrashed()->get();

        return view("posts.indexsoft", ['posts' => $posts]);
    }
    public function forcedel($id){
    //    Post::onlyTrashed()->where('id',$id)->get()->forceDelete();
        $post = Post::withTrashed()->where('id', $id)->first();
        $post->forceDelete();
        // $post->forceDelete();
    }
    public function restoredel($id){
        $post = Post::withTrashed()->where('id', $id)->restore();
        return redirect()->route('posts.index')->with('msg', ' ok restore');
    }
//create now row
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('posts/addpost');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {  //validation
        // $request->validate([
        //     'title'=>'required|unique:posts|max:255',
        //     'body' => 'required',
        // ]);

        //firstway
        // $posts=new Post();
        // $posts->title=$request->title;
        // $posts->body = $request->body;
        // $posts->save();
        //secondway
        Post::create([
            'title' => $request->title,
            'body' => $request->body
        ]);


    //    return redirect()->back()->with('msg','save ok');
    return redirect()->route('posts.index')->with('msg', 'save ok');
    }
//create now row

//show by id
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts = Post::where('id',$id)->get();
        // dd($posts);
        // $posts = Post::find($id);
        // dd($posts);
        return view('posts.index', ['posts' => $posts]);
    }
//show by id
//update by id
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $posts = Post::findorfail($id);
        // return $posts;
        return view('posts.editpost',['posts'=>$posts]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //  $post=Post::findorfail($id);
        // $post->title=$request->title;
        // $post->body = $request->body;
        // $post->save();
        Post::findorfail($id)->update([
            'title' => $request->title,
            'body' => $request->body
        ]);
        // return redirect()->back()->with('msg', 'ok updated');
        return redirect()->route('posts.index')->with('msg', 'ok updated');
    }
//update by id
//delete by id
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

       $post=Post::findorfail($id);

       $post->delete();
     return redirect()->route('posts.index')->with('msg', 'ok deleted');

    }
    //delete by id

}