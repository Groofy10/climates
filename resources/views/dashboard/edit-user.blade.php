@section('title', 'Edit User Details')

@section('head')
    <link href="{{ asset('css/edit_user.css') }}" rel="stylesheet" />
@endsection

<x-layout>
    <div class="backgroundnavbar"></div>
    <div class="content">
        <div class="container all-container">
            <div class="detail">
                <!-- Edit Details -->
                <h2>Edit User Details</h2>
                <form id="save-user-details-form" action="/dashboard/users/{{ $user->id }}" method="POST">
                    @method('PUT')
                    @csrf
                <div class="inputs">
                    <div class="rows">
                        <label class="label" for="username">Username</label>
                        <input type="text" id="username" name="username" class="form-control" value="{{ old('username', $user->username) }}">
                    </div>
                    <div class="rows">
                        <label class="label" for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $user->email) }}">
                    </div>
                    <div class="rows">
                        <label class="label" for="address">Address</label>
                        <input type="text" id="address" name="address" class="form-control" value="{{ old('address', $user->address) }}">
                    </div>
                    <div class="rows">
                        <label class="label" for="dob">Date of Birth</label>
                        <input type="date" id="dob" name="dob" class="form-control" value="{{ old('dob', $user->dob) }}">
                    </div>
                    <div class="rows">
                        <label class="label" for="verifStatus">Verification Status</label>
                        <select id="verifStatus" name="verifStatus" class="dropdown">
                            <option value="Not Verified" {{ $user->verifStatus == 'Not Verified' ? 'selected' : '' }}>Not Verified</option>
                            <option value="Pending" {{ $user->verifStatus == 'Pending' ? 'selected' : '' }}>Pending</option>
                            <option value="Verified" {{ $user->verifStatus == 'Verified' ? 'selected' : '' }}>Verified</option>
                        </select>
                    </div>
                    <div class="rows">
                        <label class="label" for="user_ktp">User KTP</label>
                        <img src="{{ asset('storage/' . $user->userKTP) }}" alt="User KTP" class="ktpimage" />
                        {{-- <button type="button" class="ButtonDelete" onclick="event.preventDefault(); document.getElementById('delete-ktp-form').submit();">Delete KTP</button> --}}
                        {{-- <form id="delete-ktp-form" action="{{ route('delete.ktp', $user->id) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form> --}}
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

                <button class="ButtonSave" type="submit" onclick="event.preventDefault(); document.getElementById('save-user-details-form').submit();">Save Details</button>
            </form>
                
                    {{-- @csrf
                    @method('PUT')
                    <input type="hidden" name="username" value="{{ old('username', $user->username) }}">
                    <input type="hidden" name="email" value="{{ old('email', $user->email) }}">
                    <input type="hidden" name="address" value="{{ old('address', $user->address) }}">
                    <input type="hidden" name="dob" value="{{ old('dob', $user->dob) }}">
                    <input type="hidden" name="verification_status" value="{{ old('verification_status', $user->verifStatus) }}"> --}}
                
            </div>
        </div>
    </div>
</x-layout>

