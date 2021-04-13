@extends('home.template')


@section('template_body')

    <div class="container">
        <br> <br>
        @if($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif

        <form action="/Upload_Post" method='Post' >
            @csrf
            <div class="mb-3">
                <label for="title"> Post Title </label>
                <input type="text" class="form-control" name="title">
            </div>

            <button type="submit" class="btn btn-dark" name="upload">Upload</button>
        </form>

    </div>
        
@endsection