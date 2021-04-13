@extends('home/template')

@section('template_body')
    <br> <br> <br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <form action="{{ route('store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="category_form" >
                    </div>
                    <div class="text-end">
                    <button type="submit" class="btn btn-dark" >Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection