@extends('home.template')


@section('template_body')

    <table class="table table-hover">
        <tr>
            <th>@id</th>
            <th>Video URL</th>
            <th>Video Path</th>
            <th>Action</th>
        </tr>

        @foreach ($videos as $video)
            <tr>
                <td>{{$video->id}}</td>
                <td>{{$video->url}}</td>
                <td>{{$video->path}}</td>
                <td>
                    <a href="/Upload_Video/{{$video->id}}">Show</a>
                    <a href="/Upload_Video/{{$video->id}}/edit">Edit</a>
                </td>
            </tr>
        @endforeach
    </table>
     
@endsection