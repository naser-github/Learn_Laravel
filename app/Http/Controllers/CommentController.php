<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UploadVideo;
use App\Models\UploadComment;
use App\Models\UpPost;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = UploadComment::all();
        return view ('comments.index', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function video($id, Request $request)
    {
        //$video = Upload_video::where('id',$id)->get();

        $video = UploadVideo::find($id);
        
        // $com = $request->input('comment');

        // $video->comments()->attach($com);

        $video->Upload_Comments()->create([
            'body' => request('comment')
        ]);
        
        return back();
    }

    public function post($id, Request $request){
        
        
        $posts = UpPost::where('id',$id)->first();
        
        // $posts = UpPost::find($id);

        // $com = $request->input('comment');

        // $posts->Upload_Comments()->attach($com);

        $posts->Upload_Comments()->create([
            'body' => request('comment')
        ]);

        return back();
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
