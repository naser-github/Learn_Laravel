@extends('home.template');

@section('template_body')

<form action="{{route('b_edit', $books[0]->id)}}" method="POST">
@csrf
@method('patch')

  @foreach ($books as $book)
    <div class="container">
    <div class="col align-self-center">
    <div class="col-sm-6 col-md-8 row gx-5">
    <div class="mb-3">
      <label class="form-label">Name</label>
      <input type="text" name="name" class="form-control" placeholder="Name" value="{{ $book->name }}">
    </div>
    <div class="mb-3">
      <label class="form-label">Isbn</label>
      <input type="text" name="isbn" class="form-control" placeholder="Isbn" value="{{ $book->isbn }}">
    </div>
    <div class="mb-3">
      <label class="form-label">Description</label>
      <input type="text" name="desc" class="form-control" placeholder="Description" value="{{ $book->desc }}">
    </div>
    <div class="mb-3">
      <select class="form-select" name="chose_author[]" aria-label="Default select example" multiple> Chose Author
          @foreach($authors as $author)
              <option value="{{ $author->id }}">
                {{ $author->name }}
              </option>
          @endforeach
      </select>
      
    </div>
    
    

    <button type="submit" class="btn btn-success" name="b_submit">UPDATE</button>
    </div>
    </div>
    </div>
  @endforeach
</form>

<br> <br> <br> <br>




@endsection