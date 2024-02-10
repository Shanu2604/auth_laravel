@extends('layout')
@section('title','Signup')
    @section('content')
    @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">{{session('error')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
     @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">{{session('success')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="container mt-4">
        <div class="row">
            <div class="container col-md-4">
                <h1 class="text-center">Signup Form</h1>
                
                <form action="{{ route('signup.post') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="Username" class="form-label">Username</label>
                        <input type="text" value="{{ old('username') }}" class="form-control @error('username') is-invalid @enderror" name="username"/>
                        <span class="text-danger">
                            @error('username')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="mb-3">
                        <label for="Email" class="form-label">Email address</label>
                        <input type="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" name="email"/>
                            <span class="text-danger">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="mb-3">
                        <label for="Password" class="form-label" >Password</label>
                        <input type="password" value="{{ old('password') }}" class="form-control @error('password') is-invalid @enderror" name="password"/>
                            <span class="text-danger">
                            @error('password')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <button type="submit" class="btn btn-primary col-md-12">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection