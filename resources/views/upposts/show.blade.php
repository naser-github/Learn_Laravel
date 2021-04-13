@extends('home.template')


@section('template_body')

    <div class="container">

        @foreach ($posts as $post)
        
            <h3>{{$post->id}}</h3>
            <h3>{{$post->title}}</h3>

            <hr>
                <h2>Comments</h2>
                <ul>
                    @foreach($post->Upload_Comments as $comment)
                    <li>{{$comment->body}}</li>
                    @endforeach
                </ul>
            <hr>

            <form action="{{route('post_comment', $post->id)}}" method='Post'>
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