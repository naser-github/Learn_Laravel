@extends('home.template')


@section('template_body')

    @if($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif
    <div class="container">
        <form class='form-group' action="/tags" method='Post' enctype="multipart/form-data">
            @csrf

            <h1>Tag</h1>  <br>
            
            Tag Name    
            <input type="text" name="title"> <br><br>

            Tag Description    
            <input type="text" name="desc"> <br><br>
            
            <button type="submit" class="btn btn-dark" name="submit">Upload</button>

        </form>
    </div>
        
@endsection