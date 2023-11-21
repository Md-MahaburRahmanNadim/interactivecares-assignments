<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Facades\DB;

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
        return view('home',compact('posts'));
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
        return view('single-post',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}