<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //by using db query builder



    if(auth()->check()){
        // join query for post and user table
        $posts = DB::table('posts')
        ->join('users','posts.user_id','=','users.id')
        ->select('posts.*','users.firstName','users.lastName','users.username')
        ->get();
        // pass comment data to view
        $comments = DB::table('comments')
        ->join('users','comments.user_id','=','users.id')
        ->select('comments.*','users.firstName','users.lastName','users.username')
        ->get();
        // dd($comments);

        return view('home',compact('posts','comments'));
    }
    return redirect()->route('register');



    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        //
        $incomingFields = $request->validated();
        $incomingFields['body'] = strip_tags($incomingFields['body']);
        $incomingFields['user_id'] = auth()->user()->id;
        DB::table('posts')->insert($incomingFields);
        return redirect()->route('home')->with('success','Post created successfully!');
    }

    /**
     * Display the specified resource.
     */
    // public function show(Post $post)
    public function show($post)
    {
        // join query for post and user table
        $post = DB::table('posts')
        ->join('users','posts.user_id','=','users.id')
        ->select('posts.*','users.firstName','users.lastName','users.username')
        ->where('posts.id',$post)
        ->first();
        // pass comment data to view
        $comments = DB::table('comments')
        ->join('users','comments.user_id','=','users.id')
        ->select('comments.*','users.firstName','users.lastName','users.username')
        ->where('comments.post_id',$post->id)
        ->get();
        $post->body = Str::markdown($post->body);
        return view('single-post',compact('post','comments'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $post)
    {
        //
        $post = DB::table('posts')
        ->select('posts.body','posts.id')
        ->where('posts.id',$post)
        ->first();
        return view('edit-post',compact('post'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request,  $post)
    {
        //
        $incomingFields = $request->validated();
        $incomingFields['body'] = strip_tags($incomingFields['body']);
        DB::table('posts')
        ->where('id',$post)
        ->update($incomingFields);
        return redirect()->route('home')->with('success','Post updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $post)
    {

        DB::table('posts')
        ->where('id',$post)
        ->delete();
        return redirect()->route('home')->with('success','Post deleted successfully!');
    }
}