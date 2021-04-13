@extends('home/template')

@section('template_body')
    <br> <br> <br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <form action="{{ route('update', $names->name) }}" method="POST">
                    @csrf
                    @method('patch')
                    
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="category_form" value=" {{ $names ->name }} ">
                    </div>
                    
                    <div class="text-end">
                    <button class="btn btn-dark" type="submit" name='submit'>Update</button>
                    </div>
                
                </form>
            </div>
        </div>
    </div>

@endsection