@section('head')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    .backgroundnavbar {
        background-color: #48773e;
        height: 95px;
        width: 100%;
        position: relative;
        margin-top: -95px;
    }

    .background {
        background-color: #48773e;
        min-height:56vh;
    }

    a {
        text-decoration: none; /* Menghilangkan underline dari semua link */
    }

    .w-85{
        width:85%;
    }

    .text-justify {
    text-align: justify;
}

    .width-desc{
        width:40%;
    }
</style>
@endsection

<x-layout>
    <div class="backgroundnavbar"></div>
    <section class="background text-white ">
        <div class="py-4 px-4 mx-auto max-w-screen-xl">
            <div class="mx-auto max-w-screen-sm text-center mb-4">
                <a href="{{ route('volunteer') }}" class="font-medium text-sm text-warning">&laquo; Back</a>
                <h2 class="mt-3 mb-4 display-4 fw-bold">My Activities</h2>
            </div>
            <div class="row g-4  d-flex justify-content-center">
                @if($activities->count())
                @foreach($activities as $activity)
                <article class="p-4 bg-white rounded border border-gray-200 shadow-sm dark:bg-gray-800 dark:border-gray-700 d-flex gap-4 w-85">
                    <div class="d-flex justify-content-between align-items-center mb-3 text-muted">
                        <img class="img-fluid" src="{{ asset('storage/' . $activity->activityImage) }}" alt="Activity Image" style="max-width: 16rem;" />
                    </div>
                    <div class="flex-grow-1 text-base mt-2 w-25">
                        <h2 class="mb-2 h5 font-weight-bold text-dark">{{ $activity->activityTitle }}</h2>
                        <div class="d-flex align-items-center mb-2 text-dark">
                            <i class="fa-regular fa-user me-2"></i>
                            {{ $activity->activityCurrentParticipants }}/{{ $activity->activityCapacity }}
                        </div>
                        <div class="d-flex align-items-center mb-2 text-dark">
                            <i class="fa-regular fa-clock me-2"></i>
                            {{ \Carbon\Carbon::parse($activity->activityTime)->format('H:i') }}
                        </div>
                        <div class="d-flex align-items-center mb-2 text-dark">
                            <i class="fa-solid fa-calendar-days me-2"></i>
                            {{ \Carbon\Carbon::parse($activity->activityDate)->format('l, d F Y') }}
                        </div>
                        <div class="d-flex align-items-center mb-2 text-dark">
                            <i class="fa-solid fa-location-dot me-2"></i>
                            {{ $activity->activityLocation }}
                        </div>
                    </div>
                    <div class="flex-grow-1 width-desc">
                        <p class="mb-0 text-muted text-justify ">{{ $activity->activityDescription }}</p>
                    </div>
                    <form action="{{ route('volunteer.leave') }}" method="POST">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                        <input type="hidden" name="activity_id" value="{{ $activity->id }}">
                        <button type="submit" class="btn btn-outline-danger">
                            Cancel
                        </button>
                    </form>
                    
                </article>
                
                @endforeach
                @else
                <div class="d-flex align-items-center justify-content-center p-4 bg-white rounded border shadow-sm">
                    <p class="h5 fw-medium text-dark">You Haven't Join Any Activity</p>
                </div>
                
                @endif
                
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</x-layout>
