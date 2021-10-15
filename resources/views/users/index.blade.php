@extends('layouts.main')

@section('content')
     <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Users</h1>
    </div>


    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <form action="{{ route('users.index') }}" method="GET">
                        <div class="form-row align-items-center">
                            <div class="col">
                                <input type="search" name='search' class="form-control mb-2" id='inlineFormInput' placeholder="jane doe">
                            </div>
                            <div class="col">
                                <button class="btn btn-primary mb-2" type="submit">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div>
                    <a href="{{ route('users.create') }}" class="btn btn-primary mb-2">Create</a>
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
                            <th scope="col">Username</th>
                            <th scope="col">Email</th>
                            <th scope="col">Manage</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <th scope="row">{{$user->id}}</th>
                            <td>{{$user->username}}</td>
                            <td>{{$user->email}}</td>
                            <td><a href="{{ route('users.edit', $user->id) }}" class="btn btn-success">Edit</a> <a class='btn btn-danger'>Delete</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
       </div>
    </div>



@endsection