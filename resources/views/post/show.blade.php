@extends('home.template')

@section('template_body')
    
    <div class="container">
        <br>

        <center>
        <table class="table table-striped table-hover ">
        <tr>
            <th> <h3> Name </h3> </th>
            <th> <h3> title at </h3> </th>
            <th> <h3> body</h3> </th>
            <th> <h3> owner_id </h3></th>
            <th> <h3> More </h3> </th>
        </tr>
        @foreach ($shows as $show)
        <tr>
            <td> {{ $show->id }}  </td>
            <td> {{ $show->title }}  </td>
            <td> {{ $show->slug }}  </td>
            <td> {{ $show->customers->name }}  </td>
            <td><a href="{{route('more',$show->customers->name)}}">view more</a></td>
            
        </tr>
        @endforeach
        </table>
        </center>
    </div>

    <br> <br> <br>

@endsection