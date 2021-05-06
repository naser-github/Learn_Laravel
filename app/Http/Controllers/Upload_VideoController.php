<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UploadVideo;
use App\Models\Tag;

class Upload_VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view ('videos.create',['videos' => UploadVideo::all()]);

        $videos = UploadVideo::all();

        return view('videos.index',compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view ('videos.create', ['tags'=>Tag::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // UploadVideo::create(request()->except('_token', 'upload') );

        $url = $request->input('url');
        $path = $request->input('video_path');
        $tags = $request->input('tags');
 
        $up = new UploadVideo;
        $up->url = $url;
        $up->path = $path;

        $up->save();

        $up->tags()->attach($tags);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $videos = UploadVideo::where('id',$id)->get();
        return view('videos.show', compact('videos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tags = Tag::all();
        $video = UploadVideo::where('id',$id)->first();
        return view ('videos.edit', compact('video','tags'));
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
        $request->validate([
            'url' => 'required|min:5'
        ]);
        $url = $request->input('url');
        $path = $request->input('video_path');
        $tags = $request->input('tags');
 
        $up = UploadVideo::where('id',$id)->first();
        $up->url = $url;
        $up->path = $path;

        // $up->tags()->detach($up->tags);
        // $up->tags()->attach($tags);

        $up->tags()->sync($tags); //alternate of detach() + attach()

        return back();
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
