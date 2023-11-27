<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ValidateCommentRequest;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(ValidateCommentRequest $request)
    {
        //
        $incomingFields = $request->validated();
        $incomingFields['user_id'] = auth()->user()->id;
        // store comment by using db facade
        DB::table('comments')->insert($incomingFields);
       return redirect()->route('posts.show', ['post' => $incomingFields['post_id']])
        ->with('success', 'Comment added successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $comment)
    {
        // fetch comment by using db facade

          $comment = DB::table('comments')->where('id',$comment)->first();

        return view('edit-comment', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(  $comment,ValidateCommentRequest $request)
    {

        $incomingFields = $request->validated();

        DB::table('comments')->where('id',$comment)->update($incomingFields);
        return redirect()->route('posts.show', ['post' => $incomingFields['post_id']])
        ->with('success', 'Comment updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $comment)
    {
        // destroy comment by using db facade
        $storingComment = DB::table('comments')->where('id',$comment)->first();
       DB::table('comments')->where('id',$comment)->delete();
        return redirect()->route('posts.show', ['post' => $storingComment->post_id])->with('success', 'Comment deleted successfully!');

    }
}