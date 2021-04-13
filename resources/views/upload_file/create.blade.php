@extends('home.template')


@section('template_body')

    @if($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif
    <div class="class="container"">
        <form class='form-group' action="{{route('upload_sending')}}" method='Post' enctype="multipart/form-data">
            @csrf

            <h1>Upload a file</h1> <br>
            
            <h1>Name</h1>
            <input type="text" name="title">

            <h1>Path</h1>
            <input type="text" name="upload_path">
            
            <h1>Upload Image</h1>
            <input type="file" name="upload_img">
            <button type="submit" class="btn btn-dark" name="upload">Upload</button>

        </form>
    </div>
        
@endsection