@extends('home.template')


@section('template_body')

    <table class="table table-hover">
        <tr>
            <th>@id</th>
            <th>Comment</th>
            <th>Commentable ID</th>
            <th>Commentable Type</th>
        </tr>

        @foreach ($comments as $comment)
            <tr>
                <td>{{$comment->id}}</td>
                <td>{{$comment->body}}</td>
                <td>{{$comment->commentable_id}}</td>
                <td>{{$comment->commentable_type}}</td>

            </tr>
        @endforeach
    </table>
     
@endsection