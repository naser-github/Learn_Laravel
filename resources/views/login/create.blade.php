@extends('home.template')


@section('template_body')

    <div class="container">
        <br> <br>

        <form action="/login/e" method='Post' >
            @csrf
            <div class="mb-3">
                <label for="user_name"> User name </label>
                <input type="text" class="form-control" name="user_name">
            </div>
            
            <div class="mb-3">
                <label for="pass">Password</label>
                <input type="password" class="form-control" name="pass">
            </div>

            <div class="mb-3">
                <label for="email"> Email </label>
                <input type="email" class="form-control" name="user_name">
            </div>

            <button type="submit" class="btn btn-dark" name="upload">Upload</button>
        </form>

    </div>
        
@endsection