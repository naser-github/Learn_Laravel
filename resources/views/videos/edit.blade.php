@extends('home.template')


@section('template_body')

    <div class="container">
        <br> <br>

        <form action="/Upload_Video/{{$video->id}}" method='Post' >
            @csrf
            @method('Put')
            <div class="mb-3">
                <label for="url"> Video Url </label>
                <input type="text" class="form-control" name="url"
                value="@php
                    echo !empty(old('url')) ? old('url'):$video->url
                    @endphp" >
            </div>
            
            <div class="mb-3">
                <label for="video_path">Video Path</label>
                <input type="text" class="form-control" name="video_path" 
                value=" {{!empty(old('video_path')) ? old('video_path'):$video->path }}"
                >
            </div>

            <div class="mb-3">
                <label for="tags">Select Tags</label>
                <select name="tags[]" class="form-control" multiple>
                     
                    @foreach ($tags as $tag)
                        <option value="{{$tag->id}}"
                            {{$selected_tags->contains($tag->id)? 'selected': ''}}>
                            {{$tag->name}}</option>    
                    @endforeach
                    
                </select> 
            </div>

            <button type="submit" class="btn btn-dark" name="upload">Upload</button>
        </form>

    </div>
        
@endsection