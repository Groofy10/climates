<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/RegisterPage.css">
    <title>Document</title>
</head>
<body>
    <x-layout>
        <div class="content">
            <div class="container all-container">
                <div class="form">
                    <div class="txt">
                        <h3>Create An Account</h3>
                    </div>
    
                    <form action="{{ route('register.store') }}" method="POST">
                        @csrf
                        <div class="inputs">
                            <div class="rows">
                                <label class="label" for="username">Username</label>
                                <input type="text" id="username" name="username" required>
                            </div>
                            <div class="rows">
                                <label class="label" for="email">Email</label>
                                <input type="email" id="email" name="email" required>
                            </div>
                            <div class="rows">
                                <label class="label" for="password">Password</label>
                                <input type="password" id="password" name="password" required>
                            </div>
                            <div class="rows">
                                <label class="label" for="address">Address</label>
                                <input type="text" id="address" name="address" required>
                            </div>
                            <div class="rows">
                                <label class="label" for="dob">Date of Birth</label>
                                <input type="date" id="dob" name="dob" required>
                            </div>
                            @if ($errors->any())
                                <div class="rows">
                                    <span class="errorMessage">{{ $errors->first() }}</span>
                                </div>
                            @endif
                            <div class="text">
                                <p class="label">Already have an account?</p>
                                <a href="{{ route('login') }}">Login Here</a>
                            </div>
                        </div>
    
                        <div class="noaccount">
                            <button type="submit" class="ButtonRegister">Register</button>
                        </div>
    
                        <div class="loginchoices">
                            <div class="text">
                                <span>OR</span>
                            </div>
                        </div>
    
                        <div class="choices">
                            <a href="{{ route('google.login') }}">
                                <img class="choicesbtn" src="{{ asset('Assets/googlelogo.png') }}" alt="Google Logo" width="30px" height="30px">
                                <span class="button-text">Login With Google</span>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </x-layout>
</body>
</html>