@extends('home.template');

@section('template_body')

<form action="{{ route('a_store') }}" method="POST">
@csrf
    <div class="container">
    <div class="col align-self-center">
    <div class="col-sm-6 col-md-8 row gx-5">
    <div class="mb-3">
      <label class="form-label">Author Name</label>
      <input type="text" name="author_name" class="form-control" placeholder="Name">
    </div>
    <div class="mb-3">
      <label class="form-label">Author Email</label>
      <input type="email" name="author_email" class="form-control" placeholder="Email">
    </div>
    

    <button type="submit" class="btn btn-success" name="a_submit">Submit</button>
    </div>
    </div>
    </div>

</form>

<br> <br> <br> <br>




@endsection