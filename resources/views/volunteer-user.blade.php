

@section('head')
@vite(['resources/css/app.css','resources/js/app.js'])


<style>


.w-120{
    width:16rem;
}

.custom-scrolled{

}
</style>
@endsection

<x-layout>
    <div class="bg-custom-green h-[95px] w-full relative -mt-[95px]"></div>
<section class="bg-custom-green dark:bg-gray-900 min-h-[56vh]">
    <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6 ">
        <div class="mx-auto max-w-screen-sm text-center lg:mb-16 mb-8">
            <a href="{{ route('volunteer') }}" class="font-medium text-sm text-yellow-300 hover:underline">&laquo; Back</a>
            <h2 class="mt-3 mb-4 text-3xl lg:text-4xl tracking-tight font-extrabold text-white dark:text-white">My Activities</h2>        </div> 
        <div class="grid gap-8 lg:grid-cols-1">

            @if($activities->count())
            @foreach($activities as $activity)
            
            
            <article class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700 flex gap-10">
                <div class="flex justify-between items-center mb-5 text-gray-500">
                    
                    <img class="max-w-64" src="{{ asset('storage/' . $activity->activityImage) }}" alt="Activity Image" />
                    
                </div>
                <div class=" w-120 text-base mt-3 ">
                    <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $activity->activityTitle }}</h2>
                    <div class="flex items-center gap-2 mb-2">
                        <i class="fa-regular fa-user inline-block align-middle"></i>
                        {{ $activity->activityCurrentParticipants }}/{{ $activity->activityCapacity }}
                    </div>
                    <div class="flex items-center gap-2 mb-2">
                        <i class="fa-regular fa-clock"></i>
                        {{ \Carbon\Carbon::parse($activity->activityTime)->format('H:i') }}

                    </div>
                    <div class="flex items-center gap-2 mb-2">
                        <i class="fa-solid fa-calendar-days"></i>
                        {{ \Carbon\Carbon::parse($activity->activityDate)->format('l, d F Y') }}
                    </div>
                    <div class="flex items-center gap-2 mb-2">
                        <i class="fa-solid fa-location-dot"></i>
                       {{ $activity->activityLocation }}
                    </div>
                    
                    
                </div>
                <div class="flex  w-1/2 mt-5">
                    <p class="mb-5 font-light text-gray-500 dark:text-gray-400">{{ $activity->activityDescription }}</p>
                </div>     
                <form action="{{ route('volunteer.leave') }}" method="POST" class=" top-3 right-3">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ auth()->id() }}">
    <input type="hidden" name="activity_id" value="{{ $activity->id }}">
                    <button class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded-xl">
                        Cancel
                      </button>
                </form>     
            </article>
            @endforeach    
            @else
            <div class="flex items-center justify-center p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                <p class="text-lg font-medium text-gray-900 dark:text-white">You Haven't Join Any Activity</p>
            </div>
            @endif          
        </div>  
    </div>
  </section>
  <script src="../path/to/flowbite/dist/flowbite.min.js"></script>

</x-layout>