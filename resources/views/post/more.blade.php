@extends('home.template')

@section('template_body')
    
    <div class="container">
        <br>

        <center>
        <table class="table table-striped table-hover ">
        <tr>
            <th> <h3> Id </h3> </th>
            <th> <h3> Name </h3> </th>
            <th> <h3> Address</h3> </th>
        </tr>
        @foreach ($check as $s)
        <tr>
            <td> {{ $s->c_id }}  </td>
            <td> {{ $s->name }}  </td>
            <td> {{ $s->address }}  </td>
            
        </tr>
        @endforeach
        </table>
        </center>
    </div>

    <br> <br> <br>

@endsection