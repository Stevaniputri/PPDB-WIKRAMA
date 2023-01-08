<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/sub.css">
    <title>Document</title>
</head>
<body>
  <style>
    body {
      background-color: #111;
    }
  </style>
    <div class="container" style="width: 70%;">
        <div class="login">
            <form method="POST" action="{{route('login.auth')}}" class="card py-4 px-4">
                @csrf
                @if (Session::get('success'))
                    <div class="alert alert-success w-75">
                        {{ Session::get('success') }}
                    </div>
                @endif
                @if (Session::get('fail'))
                            <div class="alert alert-danger">
                                {{ Session::get('fail') }}
                            </div>
                        @endif
                        @if (Session::get('notAllowed'))
                            <div class="alert alert-danger">
                                {{ Session::get('notAllowed') }}
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif


                        <h1>Login</h1>
                        <hr style="margin-bottom: 7%">
                        <label for="">Email</label>
                        <input type="text" placeholder="Username" name="email" style="margin-bottom: 3%">
                        <label for="">Password</label>
                        <input type="password" placeholder="Password" name="password">
                        <button type="submit" style="margin-top: 10%">Login</button>
                        <br><br>
                    </form>
                </div>
                <div class="right">
                    <img src="assets/images/people.png">
                </div>
            </div>
</body>



{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/more.css">
    <title>Document</title>
</head>
<body>
<div class="container d-flex justify-content-center align-items-center mt-5">
    <form method="POST" action="{{route('login.auth')}}" class="card py-4 px-4">
        @csrf
        @csrf
        @if (Session::get('success'))
            <div class="alert alert-success w-75">
                {{ Session::get('success') }}
            </div>
        @endif
        @if (Session::get('fail'))
            <div class="alert alert-danger">
                {{ Session::get('fail') }}
            </div>
        @endif
        @if (Session::get('notAllowed'))
            <div class="alert alert-danger">
                {{ Session::get('notAllowed') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="text-center logo">
            <i class="fas fa-user-circle"></i>
        </div>
        <div class="text-center mt-3">

        <span class="info-text">silahkan mengisi username dan password untuk login</span>

        </div>
        <div class="position-relative mt-3 form-input">
            <label>Username</label>
            <input class="form-control" type="text" name="username">
            <i class="fas fa-user"></i>
        </div>
        <div class="position-relative mt-3 form-input">
            <label>Password</label>
            <input class="form-control" type="password" name="password">
            <i class="fas fa-lock"></i>
        </div>

        <div class=" mt-5 d-flex justify-content-between align-items-center">
            <span><a href="/register" style="text-decoration: underline;">Tidak punya akun?</a></span>
            <button type="submit" class="go-button">login</button>
        </div>
    </form>
</div>

</body>
</html> --}}
