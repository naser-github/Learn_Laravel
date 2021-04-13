@extends('home.template')

@section('template_body')
  <br> <br>
  @foreach($inventor as $invent)
  <div class="container">
  @if ($errors->any())
      <div class="alert alert-danger">
          @foreach($errors->all() as $error)
              {{ $error}}
          @endforeach
      </div>
  @endif
    <div class="col align-self-center">
    <div class="col-sm-6 col-md-8 row gx-5">
    <form action="{{ route('i_update', $invent->id) }}" method="POST">
    @csrf
    @method('patch')
    
      <div class="mb-3">
        <label class="form-label">First Name</label>
        <input type="text" id="fname" name="fname" class="form-control {{ $errors->has('fname') ? 'is-invalid': '' }}" value="{{ $invent->firstname }}" >
        @if ($errors->has('fname'))
          <span class="invalid-feedback" role="alert">
            <strong> {{ $errors->first('fname') }}</strong>
          </span>
        @endif
      </div>
      <div class="mb-3">
        <label class="form-label">Last Name</label>
        <input type="text" id="lname" name="lname" class="form-control {{ $errors->has('lname') ? 'is-invalid': '' }}" placeholder="Last Name" value="{{ $invent->lastname }}">
        @if ($errors->has('lname'))
          <span class="invalid-feedback" role="alert">
            <strong> {{ $errors->first('lname') }}</strong>
          </span>
        @endif
      </div>
      <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" id="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid': '' }}" placeholder="email" value="{{ $invent->email }}">
        @if ($errors->has('email'))
          <span class="invalid-feedback" role="alert">
            <strong> {{ $errors->first('email') }}</strong>
          </span>
        @endif
      </div>
      <div class="mb-3">
        <label class="form-label">Date Of Birth</label>
        <input type="date" id="Date Of Birth" name="dob" class="form-control " placeholder="Date Of Birth" value="{{ $invent->dob }}">
      </div>
      <div class="mb-3">
        <label class="form-label">User Name</label>
        <input type="text" id="uname" name="uname" class="form-control {{ $errors->has('uname') ? 'is-invalid': '' }}" placeholder="Unique user Name" value="{{ $invent->username }}">
        @if ($errors->has('uname'))
          <span class="invalid-feedback" role="alert">
            <strong> {{ $errors->first('uname') }}</strong>
          </span>
        @endif
      </div>

      <button type="submit" class="btn btn-success" name="i_submit">Submit</button>
      
      </form>
      </div>
      </div>
      </div>
    @endforeach
<br> <br> <br> <br>

@endsection