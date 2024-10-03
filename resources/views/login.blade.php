<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/LoginPage.css">
    <title>Climates</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
    <x-layout>
        <div class="content">
            <div class="container all-container">
                <div class="form">
                    <div class="txt">
                        <h3>Login</h3>
                    </div>

                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Registration Successfull!</strong> Please Login!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    @endif

                    @if(session('loginError'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('loginError') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    @endif
    
                    <form action="{{ route('login.authenticate') }}" method="POST">
                        @csrf
                        <div class="inputs">
                            <div class="rows">
                                <label class="label" for="email">Email</label>
                                <input type="text" id="email" name="email" class="w-100" required>
                            </div>
                            <div class="rows">
                                <label class="label" for="password">Password</label>
                                <input type="password" id="password" name="password" class="w-100" required>
                            </div>
                            @if ($errors->any())
                                <div class="rows">
                                    <span class="errorMessage">{{ $errors->first() }}</span>
                                </div>
                            @endif
                            <div class="text">
                                <p class="label">Don't have an account?</p>
                                <a href="{{ route('register') }}">Register Here</a>
                            </div>
                        </div>
    
                        <div class="noaccount">
                            <button type="submit" class="ButtonLogin">Login</button>
                        </div>
    
                        <div class="loginchoices">
                            <div class="text">
                                <span>OR</span>
                            </div>
                        </div>
    
                        <div class="choices">
                            <a href="{{ route('google.login') }}">
                                @csrf
                                <img class="choicesbtn" src="{{ asset('Assets/googlelogo.png') }}" alt="Google Logo" width="30px" height="30px">
                                <span class="button-text">Login With Google</span>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    </x-layout>
</body>
</html>