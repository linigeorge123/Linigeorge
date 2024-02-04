@extends('home')


@section('content')

<style>
    .container {
        margin: auto;
        width: auto;
        max-width: 100%;
        height: 700;
    }

    .container form {
        width: 100%;
        height: auto;
        padding: 10px;
        background: white;
        border-radius: 4px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, .3);
    }

    .container form h2 {
        /* text-align: center; */
        margin-bottom: 24px;
        color: #222;
        text-align: center;

    }

    .container form .form-control {
        width: 95%;
        height: 40px;
        background: white;
        border-radius: 4px;
        border: 1px solid silver;
        margin: 10px 0 18px 0;
        padding: 0 10px;
    }

    .container form .btn {
        margin-left: 50%;
        transform: translateX(-50%);
        width: 30%;
        height: 50px;
        border: none;
        outline: none;
        background: #5579c6;
        cursor: pointer;
        font-size: 16px;
        color: white;
        border-radius: 4px;
        transition: .3s;
    }
</style>
<link href="{{ asset('backend/style.css') }}" rel="stylesheet">
<link href="{{ asset('backend/bootstrap.min.css') }}" rel="stylesheet">

<div class="container">
@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
    @endif
    @if(session()->has('error'))
    <div class="alert alert-danger">
        {{ session()->get('error') }}
    </div>
    @endif
    <br><br>
    <h3 align="centre">Profile</h3>
 <table class="table">
    <tr>
        <td>Name</td>
        <td>{{$user->name}}</td>

    </tr>
    <tr>
        <td>Email</td>
        <td>{{$user->email}}</td>

    </tr>
    <tr>
        <td>User Type</td>
        <td>{{$user->usertype}}</td>

    </tr>
    <tr>
        <td>Role</td>
        <td>{{$user->role->name}}</td>

    </tr>
<table>

</div>

@endsection