@extends('home.template')

@section('template_body')
    
    <div class="container">
        <br>

        <center>
        <table class="table table-striped table-hover ">
        <tr>
            <th> <h3> Name </h3> </th>
            <th> <h3> Isbn </h3> </th>
            <th> <h3> Description </h3> </th>
            <th> <h3> Author Name </h3> </th>
            <th> <h3> Created at </h3> </th>
            <th> <h3> Updated at </h3> </th>
            <th> <h3> Action </h3> </th>
        </tr>
        @foreach ($books as $book)
        <tr>
            <td> {{ $book->name }}  </td>
            <td> {{ $book->isbn }}  </td>
            <td> {{ $book->desc }}  </td>
            <td> 
                @foreach ($book->authors as $author)
                    {{ $author->name }} <br>
                @endforeach
            </td>
            <td> {{ $book->created_at }}  </td>
            <td> {{ $book->updated_at }}  </td>
            <td> 
                <a href=" {{ route('b_edit', $book->id) }} ">Edit</a>
            </td>
        </tr>
        @endforeach
        </table>
        </center>

    </div>

    <br> <br> <br>

@endsection