@extends('home.template')


@section('template_body')

    <div class="container">
        <br> <br>

        <form action="/Upload_Video" method='Post' >
            @csrf
            <div class="mb-3">
                <label for="url"> Video Url </label>
                <input type="text" class="form-control" name="url">
            </div>
            
            <div class="mb-3">
                <label for="video_path">Video Path</label>
                <input type="text" class="form-control" name="video_path">
            </div>

            <button type="submit" class="btn btn-dark" name="upload">Upload</button>
        </form>

    </div>
        
@endsection