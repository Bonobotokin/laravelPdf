<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <title>Dashio - Bootstrap Admin Template</title>

    <!-- Favicons -->
    <link href="img/favicon.png" rel="icon">
    <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Bootstrap core CSS -->
    <link href="{{asset('assets/lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <!--external css-->
    <link href="{{asset('assets/lib/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/style-responsive.css')}}" rel="stylesheet">

</head>

<body>
    <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
    <div id="login-page">
        <div class="container">
            <form action="{{ route('login') }}" class="form-login" method="post">
                @csrf
                <h2 class="form-login-heading">COnnecter vous ici</h2>
                <div class="login-wrap">
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email" autofocus>
                    @error("email")
                    {{$message}}
                    @enderror
                    <br>
                    <input type="password" name="password" class="form-control" value="{{ old('password') }}" placeholder="Password">
                    @error("password")
                    {{$message}}
                    @enderror

                    <button class="btn btn-theme btn-block" type="submit">
                        <i class="fa fa-lock"></i>
                        Connecter
                    </button>

                </div>
            </form>
        </div>
    </div>
</body>

</html>