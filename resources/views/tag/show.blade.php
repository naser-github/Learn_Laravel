@extends('home.template')


@section('template_body')

    <div class="container">
        <h1> {{$tag->name}} Tag Details</h1>
        
        <table class="table">
            <tr>
                <th>ID</th>
                <th>URL</th>
                <th>Path</th>
                <th>Action</th>
            </tr>
        
            @foreach ($tag->videos as $video)
            <tr>
                <td> {{$video->id}}</td>
                <td> {{$video->url}}</td>
                <td> {{$video->path}}</td> 
                <td> 
                    <a href="/Upload_Video/{{$video->id}}/edit">
                        Edit
                    </a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
     
@endsection