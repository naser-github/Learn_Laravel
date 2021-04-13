@extends('home.template')


@section('template_body')

    <div class="container">

        @foreach ($videos as $video)
        
            <h3>{{$video->id}}</h3>
            <h3>{{$video->url}}</h3>
            <h3>{{$video->path}}</h3>

            <hr>
                <h2>Comments</h2>
                <ul>
                    @foreach($video->Upload_Comments as $comment)
                    <li>{{$comment->body}}</li>
                    @endforeach
                </ul>
            <hr>

            <form action="{{route('video_comment', $video->id)}}" method='Post'>
                @csrf
                
                <div class="mb-3">
                    <label for="comment">Comment</label>
                    <textarea class="form-control" type="text" name="comment" cols="30" rows="10">
                    </textarea>
                    <button type="submit" class="btn btn-dark" name="upload">Upload</button>
                </div>    
            </form>
    
        @endforeach
    </div>
     
@endsection