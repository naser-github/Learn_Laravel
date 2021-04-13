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
            <br>
            <div class="pad">
                <h3> <a class="align btn btn-secondary " href="{{ route('create') }}"> Add New </a> </h3>
            </div>        
            <br> <br>

            <center>
            <table class="table table-striped table-hover ">
            <tr>
                <th> <h3> Name </h3> </th>
                <th> <h3> Created at </h3> </th>
                <th> <h3> Updated at </h3> </th>
                <th> <h3> Action </h3></th>
            </tr>
            @foreach ($categories as $cat)
                <tr>
                    <td> {{ $cat->name }}  </td>
                    <td> {{ $cat->created_at->format('d- m - y') }} </td> {{--diffforHumans() show time time difference--}}
                    <td> {{ $cat->updated_at->diffforHumans() }} </td> {{-- format() displays date format --}}
                    <td>
                        <a href="{{ route('edit', $cat->name ) }}" class='btn btn-warning btn-sm'>Edit</a>
                        
                        <form action="{{ route ('delete', $cat->name) }}" method='POST'>
                            @csrf
                            @method('delete')
                            
                            <button class='btn btn-danger btn-sm' type="submit" name="delete">Delete</button>

                        </form>
                    </td>
                </tr>
            @endforeach
            </table>
            </center>
        </div>

        <br> <br> <br>

@endsection