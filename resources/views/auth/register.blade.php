<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <title>ABC BANK</title>
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
            <center><h1>ABC BANK</h1></center><br>
            
            <form method="post" action="{{route('register.store')}}">
            @csrf
                <h2>Create new account</h2>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif

                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" placeholder="Enter name" id="name" name="name" value="{{ old('name') }}" required>
                </div>
                <div class="form-group">
                    <label>Email address</label>
                    <input type="email" class="form-control" placeholder="Enter email" id="email" name="email" value="{{ old('email') }}" pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$" title="Example: sample@gmail.com" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" placeholder="password" id="password" name="password" value="" required>
                </div>
                <div class="form-group">
                    <input type="checkbox" required name="remember"> Agree the terms and policy
                </div>
                <br><button type="submit" class="btn">Create new account</button>
            </form>
            <br><center><p>Already have an account?<a href="{{ route('login') }}" style="text-decoration: none;"> Sign in</a></p></center>
        </div>

       
    </body>
</html>