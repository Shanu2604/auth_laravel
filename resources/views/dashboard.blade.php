@extends('layout')
@section('title','Dashboard')
@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="container col-md-2">
                @auth                   
                    <strong>Hello, {{auth()->user()->name}}</strong>
                @endauth
            </div>
        </div>
    </div>
@endsection