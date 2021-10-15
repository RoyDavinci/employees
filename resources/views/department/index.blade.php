@extends('layouts.main')

@section('content')
     <!-- Page Heading -->
    <div class="d-sm-flex align-items-center">Department</h1>
    </div>


    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <form action="{{ route('department.index') }}" method="GET">
                        <div class="form-row align-items-center">
                            <div class="col">
                                <input type="search" name='search' class="form-control mb-2" id='inlineFormInput'  value="{{ old('search') }}" placeholder="jane doe">
                            </div>
                            <div class="col">
                                <button class="btn btn-primary mb-2" type="submit">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div>
                    <a href="{{ route('department.create')}}" class="btn btn-primary mb-2">Create</a>
                </div>
            </div>
            
        </div>
        <article>
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
        </article>
       <div class="row">
            <div class="card-body ">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Department Name</th>
                            <th scope="col">Manage</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($department as $role)
                        <tr>
                            <th scope="row">{{$role->id}}</th>
                            <td>{{$role->name}}</td>
                            <td><a href="{{ route('department.edit', $role->id) }}" class="btn btn-success">Edit</a> <a class='btn btn-danger'>Delete</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
       </div>
    </div>



@endsection