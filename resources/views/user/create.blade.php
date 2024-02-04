@extends('home')


@section('content')

<style>
    .container {
        margin: auto;
        width: auto;
        max-width: 100%;
        height: 500px
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
    <br><br>
    <form method="post" action="{{route('user.store')}}">
        @csrf
        <h2 align="centre">Create User</h2>

        @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
        @endif
        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="form-group">
            <label>Name</label>
            <input type="text" min="1" class="form-control" placeholder="Enter Name of User" name="name" autofocus required>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" placeholder="Enter email" id="email" name="email" value="{{ old('email') }}" pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$" title="Example: sample@gmail.com" required>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" placeholder="password" id="password" name="password" value="" required>
        </div>
        <div class="form-group">
            <label>User Type</label>
            <select class="form-control auto-select" data-selected="{{ old('user_type') }}" name="user_type" required>
                <option value="">Select One'</option>
                <option value="admin">Admin</option>
                <option value="user">User</option>
            </select>
        </div>
        <div class="form-group">
            <label>Role</label>
            <select class="form-control auto-select"  name="role" required>
                <option value="">Select One'</option>
                @foreach($roles as $role)
                <option value="{{$role->id}}">{{$role->name}}</option>
                @endforeach
            </select>
        </div>
        <br><button type="submit" class="btn">Submit</button>
    </form>

</div>

@endsection