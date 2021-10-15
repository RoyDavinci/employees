@extends('layouts.main')

@section('content')
     <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">state</h1>
    </div>


    <div class="card">
        <div class="card-header">
            Create New state
        </div>
      <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Update state') }}  
                        <a href="{{ route('state.index') }}" class="float-right">Back</a>
                    </div>
                   
                    <div class="card-body">
                        <form method="POST" action="{{ route('state.update', $state->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('name') }}</label>

                                <div class="col-md-6">
                                    <input id="rname" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name' , $state->name) }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                           <div class="form-group row">
                                <label for="country_id" class="col-md-4 col-form-label text-md-right">{{ __('Country Id') }}</label>
                                <select class="form-select-control" name="country_id" aria-label="Default select example">
                                   @foreach ($country as $country)
                                       <option value="{{ $country->id }}" {{ $country->id=== $state->country_id 
                                   ? 'selected' : '' }} >{{ $country->country_code }}</option>
                                   @endforeach
                                </select>
                                <div class="col-md-6">
                                    @error('country_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                           
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update state') }}
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
  <form action="{{ route('state.destroy', $state->id) }}" method="post" class='mb-2 mt-2 p-2 float-lg-right'>
        @csrf
        @method('DELETE')
        <button class="btn btn-danger">Delete {{ $state->name }}</button>
    </form>

@endsection