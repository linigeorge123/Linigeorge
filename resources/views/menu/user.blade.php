@php $permissions = permission_list();
@endphp

<div class="left-tab">
        <div class="left-tab-child active">
          <a href="{{route('profile.index')}}">
            <img src="{{ asset('images/list-active.png') }}" class="list-active" alt="List Active Icon">
            Dashboard
          </a>
        </div>
        @if (in_array('product.index', $permissions))
        <div class="left-tab-child">

          <a href="{{route('product.index')}}" class="nav-link">
           
            <span>Product</span>
          </a>

        </div>
        @endif

        @if (in_array('user.index', $permissions))

        <div class="left-tab-child">
          <a href="{{route('user.index')}}" class="nav-link">

            
            <span>User Management</span>
          </a>
        </div>
        @endif

        @if (in_array('role.index', $permissions))
        <div class="left-tab-child">
          <a href="{{route('role.index')}}" class="nav-link">
            
            <span>Roles</span>
          </a>
        </div>
        @endif
        @if (in_array('productcategory.index', $permissions))

        <div class="left-tab-child">
          
            <span>ProductCategory</span>
          </a>
        </div>
        @endif

        @if (in_array('permission.index', $permissions))
        <div class="left-tab-child">
          <a href="{{route('permission.index')}}" class="nav-link">
            
            <span>Permission</span>
          </a>


        </div>
        @endif

        <div class="left-tab-child">
          <a href="{{route('logout')}}" class="nav-link">
           
            <span>Logout</span>
          </a>

        </div>

      </div>