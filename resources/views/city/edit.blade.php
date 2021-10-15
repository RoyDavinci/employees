@extends('layouts.main')

@section('content')
     <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">City</h1>
    </div>


    <div class="card">
        <div class="card-header">
            Create New city
        </div>
      <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Update City') }}  
                        <a href="{{ route('city.index') }}" class="float-right">Back</a>
                    </div>
                   
                    <div class="card-body">
                        <form method="POST" action="{{ route('city.update', $city->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name' , $city->name) }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                           <div class="form-group row">
                                <label for="state_id" class="col-md-4 col-form-label text-md-right">{{ __('state Id') }}</label>
                                <select class="form-select-control" name="state_id" aria-label="Default select example">
                                   @foreach ($state as $state)
                                       <option value="{{ $state->id }}" {{ $state->id=== $city->state_id 
                                   ? 'selected' : '' }} >{{ $state->name}}</option>
                                   @endforeach
                                </select>
                                <div class="col-md-6">
                                    @error('state_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                           
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update city') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>  
            </div>
        </div>
      </div>
    </div>
  <form action="{{ route('city.destroy', $city->id) }}" method="post" class='mb-2 mt-2 p-2 float-lg-right'>
        @csrf
        @method('DELETE')
        <button class="btn btn-danger">Delete {{ $city->name }}</button>
    </form>

@endsection