<!-- resources/views/activity_detail.blade.php -->

@section('title', 'Activity Detail')
@section('head')
<link href="{{ asset('css/volunteer-detail.css') }}" rel="stylesheet">
{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> --}}
@endsection


<x-layout>
    <div class="banner"></div>
    <div class="content">
        <div class="flex justify-center items-center min-h-screen">
            <div class="bg-white border border-gray-200 rounded-lg shadow-md p-4 max-w-xs w-full">
        <div class="this-container all-container">
            @if(session('success'))
            <div class="alert" id="myAlert">
                <span class="alert-message">{{ session('success') }}</span>
                <button class="close-btn" onclick="closeAlert()">×</button>
            </div>
            @endif
            @if(session('error'))
            <div class="alert-error" id="myAlert">
                <span class="alert-message-error">{{ session('error') }}</span>
                <button class="close-btn-error" onclick="closeAlert()">×</button>
            </div>
            @endif
            <a href="{{ route('volunteer') }}" class="back">&laquo; Back</a>
            <div class="head">
                <h1 class="custom-judul">{{ $activity->activityTitle ?? 'Judul' }}</h1>
                <p class="custom-organizer">{{ $activity->activityCreator ?? 'Organizer' }}</p>
            </div>
    
            <div class="insider-container">
                <div class="custom-leftcontent">
                    <img src="{{ asset('storage/' . $activity->activityImage) }}" alt="null" id="activityimage" />
                    <p class="desc">{{ $activity->activityDescription ?? 'Description' }}</p>
                </div>
    
                <div class="custom-rightcontent">
                    <div class="custom-this-row">
                        <p>Location :</p>
                        <p>{{ $activity->activityLocation ?? 'Location' }}</p>
                    </div>
    
                    <div class="custom-this-row">
                        <p>Start / End Registration :</p>
                        <div>
                            <p>{{ $activity->activityStartRegistration ?? 'Start Date' }} / {{ $activity->activityEndRegistration ?? 'End Date' }}</p>
                        </div>
                    </div>
    
                    <div class="custom-this-row">
                        <p>Date and Time :</p>
                        <div>
                            <p>{{ $activity->activityDate ?? 'Date' }} / {{ $activity->activityTime ?? 'Time' }}</p>
                        </div>
                    </div>
    
                    <div class="custom-this-row">
                        <p>Current Participants :</p>
                        <div>
                            <p>{{ $activity->activityCurrentParticipants ?? 'Current Participant' }} / {{ $activity->activityCapacity ?? 'Capacity' }}</p>
                        </div>
                    </div>
    
                    <div class="lastrow">
                        <p>Requirements :</p>
                        <p>{{ $activity->activityRequirements ?? 'Requirements' }}</p>
                    </div>
    
                    <form action="{{ route('volunteer.join') }}" method="POST">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                        <input type="hidden" name="activity_id" value="{{ $activity->id }}">
                        <button type="submit" class="buttonJoin">Join Activity</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        function closeAlert() {
    var alert = document.getElementById('myAlert');
    alert.style.display = 'none';
}

    </script>
    </x-layout>

    