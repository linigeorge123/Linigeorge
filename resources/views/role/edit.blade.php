
@extends('home')


@section('content')

<style>
    
    .container{
        margin: auto;
        width: 1000px;
        max-width: 100%;
        height:500px
    }
    .container form{
        width: 100%;
        height: 100%;
        padding: 10px;
        background: white;
        border-radius: 4px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, .3);
    }
    .container form h2{
        /* text-align: center; */
        margin-bottom: 24px;
        color: #222;
        text-align: center;

    }
    .container form .form-control{
        width: 95%;
        height: 40px;
        background: white;
        border-radius: 4px;
        border:1px solid silver;
        margin: 10px 0 18px 0;
        padding: 0 10px;
    }
    .container form .btn{
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
            <br><br><form method="post" action="{{route('role.update')}}">
            @csrf
                <h2 align="centre">Create Role</h2>

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
    <input type="hidden"  class="form-control" value="{{$role->id}}"  name="id"   >

                <div class="form-group">
                    <label>Name</label>
                    <input type="text"  class="form-control" value="{{$role->name}}" placeholder="Enter Name of Role" name="name"  autofocus required>
                </div>
                <br><button type="submit" class="btn">Submit</button>
            </form>
            
        </div>

@endsection
