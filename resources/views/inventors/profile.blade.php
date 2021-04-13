@extends('home.template') 


@section('template_body')
    <br>
    <div class="container">
        <h3>List</h3>
        <br>

        @foreach($profiles as $profile)
            <h3>Name: {{ $profile->inventor->firstname }} </h3>
            <br>
            <h3>DP: {{ $profile->dp }} </h3>
            <br>
            <h3>BIO: {{ $profile->bio }} </h3>
            <br> 
            <h3>Address: {{ $profile->address }} </h3>
            <br>
        @endforeach
    </div>

@endsection