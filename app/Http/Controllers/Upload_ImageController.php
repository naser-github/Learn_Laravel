<?php

namespace App\Http\Controllers;

use App\Models\uploaduser;
use App\Models\Upload_photo;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class Upload_ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        
        return view ('upload_file.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'upload_img.*' => 'required'
            // [ .* ] uses for multiple validation condition will apply on every variable equally
        ]);
        
        try{
            DB::transaction(function(){
                $user = uploaduser::create([
                    'name' => request('title')
                ]);
        
                $path = request('upload_path');
                
                $user->upload_photos()->create([
                     'path' =>$path
                ]);
            });

        }catch(Exception $e){
            return back();
        }
                
        return back();
 
    }

    public function image(){
        
        $up = Upload_photo::find(1);

        return $up->load('imageable');
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
