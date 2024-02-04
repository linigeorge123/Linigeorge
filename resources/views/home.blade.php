<!DOCTYPE html>

<html lang="en">

<head>

  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Lini George</title>
  <link rel="icon" type="images/x-icon" href="{{asset('images/x-icon')}}">


  <link rel="stylesheet" type="text/css" href="{{ asset('fonts/SEGOEUI.TTF') }}">


  <link rel="stylesheet" href="style/style.css">
  <link href="{{ asset('backend/style.css') }}" rel="stylesheet">
  <link href="{{ asset('backend/bootstrap.min.css') }}" rel="stylesheet">


  <style>
    .modal-dialog.modal-md {
      margin-top: 10%;
    }

    .nav-link {
      display: flex;
      align-items: center;
      text-decoration: none;
      padding: 10px;
      color: #333;
      /* Set your desired text color */
    }

    .nav-link {
      /* display: flex; */
      align-items: center;
      text-decoration: none;
      //padding: 10px;
      color: #000000;
      /* Set your desired text color */
    }

    .nav-link svg {
      margin-right: 10px;
      /* Adjust the spacing between the icon and text */
      width: 24px;
      /* Set the width of the SVG icon */
      height: 24px;
      /* Set the height of the SVG icon */
      fill: #000000;
      /* Set the fill color of the SVG icon */
    }

    .nav-link:hover {
      border-radius: 5px;
      /* Add border-radius for a rounded look on hover */
    }
  </style>
</head>



<body>
  <div id="app" class="main-body">
    <div class="body-left">
      <div class="header-left flex-align2">
        <img src="images/logo.png">
        <h1>Project</h1>
      </div>
      <div class="left-tab">
      @include('menu.'.Auth::user()->usertype)


      </div>

    </div>
    <div class="body-right">
        <section>@yield('content')</section>
      <section>@yield('js-script')</section>
    </div>
  </div>

</body>



</html>