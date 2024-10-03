<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
    <link href="{{ asset('css/profile.css') }}" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
    <x-layout>
        <div class="content">
            <div class="all-container container">
               
                <div class="form">
                    
                    <div class="txt">
                        <h3>Profile</h3>
                    </div>
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{session('success')  }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    @endif
                    <form method="POST" action="{{ route('profile.update', ['User' => $user->id]) }}">
                        @csrf
                            @method('put')
                    <div class="inputs">
                        <div class="rows">
                            <label class="label" for="username">Username</label>
                            <input type="text" id="username" name="username" value="{{ old('username', $user->username) }}" disabled>
                        </div>
                        <div class="rows">
                            <label class="label" for="email">Email</label>
                            <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" disabled>
                        </div>
                        <div class="rows">
                            <label class="label" for="address">Address</label>
                            <input type="text" id="address" name="address" value="{{ old('address', $user->address) }}" disabled>
                        </div>
                        <div class="rows">
                            <label class="label" for="dob">Date of Birth</label>
                            <input type="date" id="dob" name="dob" value="{{ old('dob', $user->dob) }}" disabled>
                        </div>
                        <div class="rows">
                            <label class="label" for="identity_status">Identity Status</label>
                            <input type="text" id="identity_status" name="verifStatus" value="{{ $user->verifStatus }}" disabled>
                            @if($user->verifStatus   == 'Not Verified')
                                <span>Please verify your identity <a href="{{ route('verif') }}">here</a></span>
                            @elseif($user->verifStatus == 'Pending')
                                <span>Please wait for approval</span>
                            @endif
                        </div>
                        <div class="rows">
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        </div>
                    </div>
    
                    <div class="update" id="edit-buttons">
                        <button id="editProfileBtn" class="ButtonEdit" type="button">Edit Profile</button>
                    </div>
                    
                    <div class="edit" id="save-cancel-buttons" style="display: none;">
                            <button type="submit" class="ButtonSubmit">Submit</button>
                            <button type="button" id="cancelEditBtn" class="ButtonCancel">Cancel</button>
                        
                    </div>
                </form>
                    <script>
                        const inputs = document.querySelectorAll('input');
                        const originalValues = {};
                
                        inputs.forEach(input => {
                            originalValues[input.id] = input.value;
                        });
                
                    
                        document.getElementById('editProfileBtn').addEventListener('click', function() {
                            inputs.forEach(input => {
                                if (input.id !== 'identity_status') {
                                        input.removeAttribute('disabled');
                                    }
                            });
                
                            document.getElementById('edit-buttons').style.display = 'none';
                            document.getElementById('save-cancel-buttons').style.display = 'block';
                        });
                
                        document.getElementById('cancelEditBtn').addEventListener('click', function() {
                            inputs.forEach(input => {
                                input.disabled = true;  
                                input.value = originalValues[input.id]; 
                            });
                

                            document.getElementById('edit-buttons').style.display = 'block';
                            document.getElementById('save-cancel-buttons').style.display = 'none';
                        });
                    </script>
                </div>
            </div>
        </div>
    </x-layout>
</body>
</html>


    
