<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/VolunteerPage.css">
    <title>Climates</title>
</head>
<body>
    <x-layout>
        <section>
            <div class="banner">
                <div class="all-container container">
                    <h1>More People
                        <br />
                        Means
                        <br />
                        More Impact.</h1>
                </div>
            </div>

            <div class="volunteerList">
                <div class="vol-container">
                    <div class="volunteer-head">
                        <h1>Join Our Volunteer Network
                            <br />
                            in Simple <span class="tiga">3</span> Steps
                        </h1>
                        @if(auth()->id())
                        <a href="{{ route('volunteer.user',auth()->id()) }}">
                            See Joined Activities
                        </a>
                        @endif
                    </div>
                    
                    <div class="threesteps">
                        <div class="steps">
                            <span class="angka">1</span>
                            <h1>Sign Up and be one of the climates</h1>
                        </div>
                        <div class="steps">
                            <span class="angka">2</span>
                            <h1>Select Events</h1>
                        </div>
                        <div class="steps">
                            <span class="angka">3</span>
                            <h1>Confirmation and Preparation</h1>
                        </div>
                        <div class="vertical-line"></div>
                        <div class="done">
                            <span class="alldonetext">All Done?</span>
                            <h1>Now You’re ready to go!</h1>
                        </div>
                    </div>

                    <div class="lists" id="lists">
                        @if($activities->count())
                            @foreach($activities as $activity)
                                <div class="card">
                                    <div class="card-container">
                                        <img class="logo" src="{{ asset('storage/' . $activity->activityImage) }}" alt="Activity Image" />
                                        <div class="card-detail">
                                            <h1>{{ Str::limit($activity->activityTitle, 50) }}</h1>
                                            <div class="detail-rows">
                                                <div class="rows">
                                                    <img src="Assets/user.png" alt="Participants" />
                                                    <span>{{ $activity->activityCurrentParticipants }}/{{ $activity->activityCapacity }}</span>
                                                </div>
                                                <div class="rows">
                                                    <img src="Assets/clock.png" alt="Time" />
                                                    <span>{{ \Carbon\Carbon::parse($activity->activityTime)->format('H:i') }}</span>
                                                </div>
                                                <div class="rows">
                                                    <img src="Assets/calendar.png" alt="Date" />
                                                    <span>{{ \Carbon\Carbon::parse($activity->activityDate)->format('l, d F Y') }}</span>
                                                </div>
                                                <div class="rows">
                                                    <img src="Assets/map-pin.png" alt="Location" />
                                                    <span>{{ Str::limit($activity->activityLocation, 20) }}</span>
                                                </div>
                                            </div>
                                            <div class="lastrows">
                                                <a href="{{ route('volunteer.detail',$activity->id) }}">
                                                    <span>Info Lengkap</span>
                                                    <img src="Assets/arrow-right-circle.png" alt="Info" />
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p>No volunteer activities available.</p>
                        @endif
                    </div>
                </div>

                <div class="movement">
                    <div class="move-container">
                        <h1>Dreaming of Change?
                            <br />
                            Create Your Own Movement </h1>
                        <p>
                            It's time to do more than just dream. Let's build together a volunteer movement that changes the world! Everyone has the power to ignite positive change. Whatever cause touches your heart, you can become a change agent leading the way to solutions. From caring for the environment to empowering future generations, every small step brings us closer to a greater goal. 
                        </p>
                        <p>
                            When you take the first step, you inspire others to join in, forming an unstoppable wave of solidarity. No need to wait. No need for permission. Start today. Be the catalyst for a new movement that brings hope and real change to our world.
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </x-layout>
</body>
</html>
