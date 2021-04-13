@extends('home.template')


@section('template_body')

    @if($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif
    <form action="/fileup" method='Post' enctype="multipart/form-data">
        @csrf

        <h1>Upload a file</h1> <br>
        
        <input type="file" name="user_img[]" multiple>
        {{-- using multiple helps to upload multiple file--}}  
        <button type="submit" class="btn btn-dark" name="upload">Upload</button>

    </form>
@endsection