@extends('home.template')

@section('template_body')
    <br> <br>
    
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
    
    <form action="{{ route('sending') }}" method="POST">
    @csrf 
        <div class="mb-3">
            <label class="form-label">TO</label>
            <input 
                class="form-control {{ $errors->has('mail') ? 'is-invalid': '' }}" 
                type="text" 
                id="mail" 
                name="mail" 
                placeholder="mail" 
                value="{{ old('mail') }}"
            >
            @if ($errors->has('mail'))
              <span class="invalid-feedback" role="alert">
                <strong> {{ $errors->first('mail') }}</strong>
              </span>
            @endif
        </div>
        <div class="mb-3">
            <label class="form-label">Last Name</label>
            <input type="text" id="body" name="body" class="form-control {{ $errors->has('body') ? 'is-invalid': '' }}" placeholder="body">
            @if ($errors->has('body'))
                <span class="invalid-feedback" role="alert">
                <strong> {{ $errors->first('mail') }}</strong>
            </span>
            @endif
        </div>

    <button type="submit" class="btn btn-success" name="i_submit">Submit</button>
      
    </form>
    </div>
    </div>
    </div>

<br> <br> <br> <br>

@endsection