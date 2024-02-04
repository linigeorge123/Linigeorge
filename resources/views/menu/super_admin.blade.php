<div class="left-tab">
        <div class="left-tab-child active">
          <a href="{{route('profile.index')}}">
            <img src="{{ asset('images/list-active.png') }}" class="list-active" alt="List Active Icon">
            Dashboard
          </a>
        </div>
        <div class="left-tab-child">

          <a href="{{route('product.index')}}" class="nav-link">
            
            <span>Product</span>
          </a>

        </div>

        <div class="left-tab-child">
          <a href="{{route('user.index')}}" class="nav-link">

            
            <span>User Management</span>
          </a>
        </div>

        <div class="left-tab-child">
          <a href="{{route('role.index')}}" class="nav-link">
            
            <span>Roles</span>
          </a>
        </div>
        <div class="left-tab-child">
          <a href="{{route('productcategory.index')}}" class="nav-link">
           
            <span>ProductCategory</span>
          </a>
        </div>
        <div class="left-tab-child">
          <a href="{{route('permission.index')}}" class="nav-link">
           
            <span>Permission</span>
          </a>

        </div>
        <div class="left-tab-child">
          <a href="{{route('logout')}}" class="nav-link">
            
            <span>Logout</span>
          </a>

        </div>

      </div>