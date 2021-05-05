@extends('home.template') 

@section('template_css')
    <style>
        .pad{
            text-align: right;
            padding-right: 2%;
        }
        .align{
            display: inline;
            text-align: center;
            color: white;
            text-decoration: none;
            text-decoration-style: wavy;
        }
    </style>
@endsection

@section('template_body')
    
        <div class="container">
            @if(session('suck'))
            <div class="alert alert-success" role="alert">
                {{session('suck')}}
            </div>
            @endif

            <br>
            <div class="pad">
                <h3> <a class="align btn btn-secondary " href="/tags/create"> Add New </a> </h3>
            </div>        
            <br> <br>

            <center>
                <table class="table table-striped table-hover ">
                <tr>
                    <th> <h3> Id </h3> </th>
                    <th> <h3> Name </h3> </th>
                    <th> <h3> Desc at </h3> </th>
                </tr>
                @foreach ($tags as $tag)
                    <tr>
                        <td> {{ $tag->id }}  </td>
                        <td> {{ $tag->name }}  </td>
                        <td> {{ $tag->desc }}  </td>
                    </tr>
                @endforeach
                </table>
            </center>
        </div>

        <br> <br> <br>

@endsection