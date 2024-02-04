<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ABC Bank</title>
    <style>
        *{
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }
            body{
                min-height: 100vh;
                background: azure;
                display: flex;
                font-family: sans-serif;
            }
            .container{
                margin: auto;
                width: 500px;
                max-width: 90%;
            }
            .container form{
                width: 100%;
                height: 100%;
                padding: 20px;
                background: white;
                border-radius: 4px;
                box-shadow: 0 8px 16px rgba(0, 0, 0, .3);
            }
            .container form h2{
                /* text-align: center; */
                margin-bottom: 24px;
                color: #222;
            }
            .container form .form-control{
                width: 100%;
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
                width: 100%;
                height: 34px;
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
</head>
<body>
    <div class="container">
        <center><h1>Admin</h1></center><br>
        @if (Session::has('error'))
                    <div class="alert alert-danger">
                        {{Session::get('error')}}
                    </div>
                @endif
        <form method="post" action="{{route('login.custom')}}">
        @csrf
            <h2>Login to your account </h2>
            
            <div class="form-group">
                <label>Email address</label>
                <input type="text" class="form-control" placeholder="Enter email" id="email" name="email" pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$" title="Example: sample@gmail.com" autofocus required>

            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" placeholder="Password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <input type="checkbox" name="remember"> Remember me
            </div>
            <br><button type="submit" class="btn">Sign in</button>
        </form>
        
    </div>
</body>
</html>