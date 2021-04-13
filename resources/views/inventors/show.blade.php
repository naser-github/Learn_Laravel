@extends('home.template') 

@section('template_body')
    
        <div class="container">
            <br>
            <div class="pad">
                <h3> <a class="align btn btn-secondary " href="{{ route('i_create') }}"> Add New Inventors</a> </h3>
            </div>        
            <br> <br>

            <center>
            <table class="table table-striped table-hover ">
            <tr>
            <th> <h3> ID </h3> </th>
                <th> <h3> First Name </h3> </th>
                <th> <h3> Last Name </h3> </th>
                <th> <h3> DOB </h3> </th>
                <th> <h3> Email </h3> </th>
                <th> <h3> User Name </h3> </th>
                <th> <h3> Created at </h3> </th>
                <th> <h3> Updated at </h3> </th>
                <th> <h3> Action </h3></th>
            </tr>
            @foreach ($inventors as $inventor)
                <tr>
                    <td> {{ $inventor->id }}  </td>
                    <td> {{ $inventor->firstname }}  </td>
                    <td> {{ $inventor->lastname }}  </td>
                    <td> {{ $inventor->dob->diffforHumans() }}  </td>
                    <td> {{ $inventor->email }}  </td>
                    <td> {{ $inventor->username }}  </td>
                    <td> {{ $inventor->created_at->format('d- m - y') }} </td> {{--diffforHumans() show time time difference--}}
                    <td> {{ $inventor->updated_at->diffforHumans() }} </td> {{-- format() displays date format --}}
                    <td>
                        <a href="{{ route('i_profile', $inventor->id) }}"> View Profile </a>
                        <br>
                        <a href="{{ route('i_edit', $inventor->id) }}"> Edit Profile</a>
                    <form action="{{ route('i_delete', $inventor->id) }}" method="POST">
                    @csrf
                    @method('delete')
                        <button class="btn btn-danger">Delete Profile</button>
                    </form>

                    </td>


                </tr>
            @endforeach
            </table>
            </center>

            
        </div>

    
        <br> <br> <br>

@endsection