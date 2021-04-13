@extends('home.template')

@section('template_body')
    
    <div class="container">
        <br>

        <center>
        <table class="table table-striped table-hover ">
        <tr>
            <th> <h3> Name </h3> </th>
            <th> <h3> Email </h3> </th>
            <th> <h3> Created at </h3> </th>
            <th> <h3> Updated at </h3> </th>
        </tr>
        @foreach ($authors as $author)
        <tr>
            <td> {{ $author->name }}  </td>
            <td> {{ $author->email }}  </td>
            <td> {{ $author->created_at }}  </td>
            <td> {{ $author->updated_at }}  </td>
            
        </tr>
        @endforeach
        </table>
        </center>
    </div>
    
    {{$authors->links()}}
    
    @section('template_css')

    @endsection

    <br> <br> <br>

@endsection