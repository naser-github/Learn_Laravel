@extends('home.template')


@section('template_body')

    <table class="table table-hover">
        <tr>
            <th>@id</th>
            <th>Title</th>
            <th>Action</th>
        </tr>

        @foreach ($posts as $post)
            <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->title}}</td>
                <td>
                    <a href="/Upload_Post/{{$post->id}}">Show</a>
                </td>
            </tr>
        @endforeach
    </table>
     
@endsection