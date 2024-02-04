@extends('home')


@section('content')

<style>
    .container {
        margin: auto;
        width: auto;
        max-width: 100%;
        height: auto;
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

    /* Custom styles for the collapsible elements */
    .card-link {
        display: block;
        padding: 10px;
        background-color: #f8f9fa;
        /* Background color when not collapsed */
        color: #007bff;
        /* Link color */
        text-decoration: none;
        transition: background-color 0.3s;
    }

    .accordion {
        overflow-anchor: none;
    }

    .accordion>.card {
        overflow: hidden;
    }
.scroll {
    width:100%;
    max-width: 1120px;
    height: 150px;
    overflow: auto;
    overflow-x: hidden;
}
</style>
</style>
<link href="{{ asset('backend/style.css') }}" rel="stylesheet">
<link href="{{ asset('backend/bootstrap.min.css') }}" rel="stylesheet">

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
    <form method="post" id="permissions" class="validate" autocomplete="off" action="{{ route('permission.store') }}">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Select Role</label>
                                <select class="form-control select2" id="role_id" name="role_id" required>
                                    @php $roles = \App\Models\Role::where('deleted_at',NULL)->orderBy('id','desc')->get(); @endphp
                                    <option value="">Select One</option>

                                    @foreach($roles as $role)
                                    <option value="{{$role->id}}" {{  $role->id==$role_id   ? 'selected' : ''}}>{{ $role->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-4">
            <span class="d-none header-title">Permission Control</span>

                <div class="row">
                    <div class="col-md-12">
                        <div class="scroll">
                            @php $i = 1; @endphp
                            @foreach($permission as $key => $val)

                                        <table class="table">
                                            @foreach($val as $name => $url)
                                            <tr>
                                                <td>
                                                    <div class="checkbox">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" name="permissions[]" value="{{ $name }}" id="customCheck{{ $i + 1 }}" {{ array_search($name,$permission_list) !== FALSE ? "checked" : "" }}>
                                                            <label class="custom-control-label" for="customCheck{{ $i + 1 }}">{{ str_replace("index","list",$name) }}</label>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @php $i++; @endphp
                                            @endforeach
                                        </table>
     
                            @endforeach
                    </div>

                    <div class="col-md-12 mt-4">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Save Permission</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

</div>

@endsection
@section('js-script')

<script src="{{ asset('backend/js/jquery.min.js') }}"></script>
<script src="{{ asset('backend/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('backend/js/script.js') }}"></script>
<!-- First, include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Then, include Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    	$(document).on('change', '#role_id', function () {
		showRole($(this));
	});
    function showRole(elem) {
	if ($(elem).val() == '') {
		return;
	}
    var baseUrl = '<?=url('');?>';

	// if(document.getElementById("company_id").value=='')
	// {
	window.location = baseUrl + '/permission/control/' + $(elem).val();
	// }
	// else
	// {
	//     var company_id = document.getElementById("company_id").value;
	//     window.location = _url + '/permission/control/' + $(elem).val()+'/'+ company_id;
	// }
}
</script>

@endsection