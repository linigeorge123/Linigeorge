@extends('home')


@section('content')

<style>
    .container {
        margin: auto;
        width: 1000px;
        max-width: 100%;
        height: 500px
    }

    .container form {
        width: 100%;
        height: 100%;
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

    table,
    th,
    td {
        border: 1px solid black;
    }
</style>
<link href="{{ asset('backend/style.css') }}" rel="stylesheet">
<link href="{{ asset('backend/bootstrap.min.css') }}" rel="stylesheet">
<link href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<div class="container">
    <br><br>

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
    @php $permissions = permission_list();
@endphp
@php $user=Auth::user(); 
$user_type = $user->usertype;@endphp
@if ($user_type != 'super_admin' )
@if (in_array('role.create', $permissions))

    <div class="card-header d-flex align-items-center pt-0">
                    <a class="btn  btn-secondary text-light ml-auto" href="{{route('role.create')}}"><i class="fa fa-plus"></i> Add New</a>
                </div>
    @endif
    @else
    <div class="card-header d-flex align-items-center pt-0">
                    <a class="btn  btn-secondary text-light ml-auto" href="{{route('role.create')}}"><i class="fa fa-plus"></i> Add New</a>
                </div>
    @endif
    <table id="role_table" class="table data-table" style="width:100%;background:white; height:30%;">
        <thead>
            <tr>
                <th>Name</th>
                <th class="text-center">Action</th>

            </tr>
        </thead>
        <tbody>
            @foreach($roles as $role)



            <tr>
                <td>{{$role->name}}</td>
        @if ($user_type != 'super_admin' ) 
                <td class="text-center">@if (in_array('role.edit', $permissions)) <a href="{{route('role.edit', $role['id'])}}" data-title="Update blogpost" class="btn btn-warning btn-sm ajax-modal"> Edit<i class="ti-pencil-alt"></i></a>@endif
                @if (in_array('role.destroy', $permissions))<a href="{{route('role.destroy', $role['id'])}}" data-title="Delete blogpost" class="btn btn-warning btn-sm ajax-modal"> Delete<i class="ti-pencil-alt"></i></a>@endif
                </td>
                @else
                <td class="text-center"><a href="{{route('role.edit', $role['id'])}}" data-title="Update blogpost" class="btn btn-warning btn-sm ajax-modal"> Edit<i class="ti-pencil-alt"></i></a>
                <a href="{{route('role.destroy', $role['id'])}}" data-title="Delete blogpost" class="btn btn-warning btn-sm ajax-modal"> Delete<i class="ti-pencil-alt"></i></a>
                </td>
            @endif


            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection

@section('js-script')
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script>
    $(document)
        .ready(function() {
            $('#role_table')
                .DataTable();
        });
</script>
@endsection