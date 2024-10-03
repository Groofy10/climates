
@section('head')
    <link href="{{ asset('css/edit_activity.css') }}" rel="stylesheet" />
@endsection

<x-layout>
<div class="backgroundnavbar"></div>
<div class="content">
    <div class="container all-container">
        <div class="detail">
            <!-- Edit Details -->
            <h2>Edit Activity Details</h2>
            <div class="inputs">
                <form action="{{ route('dashboard.event.update', $activity->id) }}" method="POST" id="save-activity-details-form">
                    @csrf
                    @method('PUT')

                    <div class="split">
                        <div class="left">
                            <div class="rows">
                                <label class="label" for="activityTitle">Title</label>
                                <input class="textboxcss" type="text" id="activityTitle" name="activityTitle" value="{{ old('activityTitle', $activity->activityTitle) }}" required />
                            </div>
                            <div class="rows">
                                <label class="label" for="activityCreator">Creator</label>
                                <input class="textboxcss" type="text" id="activityCreator" name="activityCreator" value="{{ old('activityCreator', $activity->activityCreator) }}" required />
                            </div>
                            <div class="rows">
                                <label class="label" for="activityDate">Date</label>
                                <input class="textboxcss" type="date" id="activityDate" name="activityDate" value="{{ old('activityDate', $activity->activityDate) }}" required />
                            </div>
                            <div class="rows">
                                <label class="label" for="activityLocation">Location</label>
                                <input class="textboxcss" type="text" id="activityLocation" name="activityLocation" value="{{ old('activityLocation', $activity->activityLocation) }}" required />
                            </div>
                        </div>
                        <div class="right">
                            <div class="rows">
                                <label class="label" for="activityStartRegistration">Start Registration</label>
                                <input class="textboxcss" type="date" id="activityStartRegistration" name="activityStartRegistration" value="{{ old('activityStartRegistration', $activity->activityStartRegistration) }}" required />
                            </div>
                            <div class="rows">
                                <label class="label" for="activityEndRegistration">End Registration</label>
                                <input class="textboxcss" type="date" id="activityEndRegistration" name="activityEndRegistration" value="{{ old('activityEndRegistration', $activity->activityEndRegistration) }}" required />
                            </div>
                            <div class="rows">
                                <label class="label" for="activityTime">Time</label>
                                <input class="textboxcss" type="time" id="activityTime" name="activityTime" value="{{ old('activityTime', $activity->activityTime) }}" required />
                            </div>
                            <div class="rows">
                                <label class="label" for="activityCapacity">Capacity</label>
                                <input class="textboxcss" type="number" id="activityCapacity" name="activityCapacity" value="{{ old('activityCapacity', $activity->activityCapacity) }}" required />
                            </div>
                        </div>
                    </div>

                    <div class="rows">
                        <label class="label" for="activityDescription">Description</label>
                        <textarea class="textboxDescReqcss" id="activityDescription" name="activityDescription" rows="5" placeholder="Max. 300 words">{{ old('activityDescription', $activity->activityDescription) }}</textarea>
                    </div>
                    <div class="rows">
                        <label class="label" for="activityRequirements">Requirements</label>
                        <textarea class="textboxDescReqcss" id="activityRequirements" name="activityRequirements" rows="5" placeholder="Max. 300 words">{{ old('activityRequirements', $activity->activityRequirements) }}</textarea>
                    </div>
                    <div class="rows">
                        <label class="label" for="ActivityVerifStatus">Status</label>
                        <select id="ActivityVerifStatus" name="ActivityVerifStatus" class="dropdown">
                            <option value="Request" {{ $activity->ActivityVerifStatus == 'Request' ? 'selected' : '' }}>Request</option>
                            <option value="On Going" {{ $activity->ActivityVerifStatus == 'On Going' ? 'selected' : '' }}>On Going</option>
                            <option value="Completed" {{ $activity->ActivityVerifStatus == 'Completed' ? 'selected' : '' }}>Completed</option>
                            <option value="Rejected" {{ $activity->ActivityVerifStatus == 'Rejected' ? 'selected' : '' }}>Rejected</option>
                        </select>
                    </div>

                    <div class="rows">
                        <label class="label" for="thumbnail">Thumbnail</label>
                        <img src="{{ asset('storage/' . $activity->activityImage) }}" alt="thumbnail" class="thumbnail" id="thumbnail" />
                        {{-- <button type="button" class="ButtonDelete" onclick="event.preventDefault(); document.getElementById('delete-thumbnail-form').submit();">Delete Thumbnail</button>
                        <form id="delete-thumbnail-form" action="{{ route('dashboard.event.deleteImage', $activity->id) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form> --}}
                    </div>
                    <div class="rows">
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

                    <div class="rows">
                        <button class="ButtonSave" type="submit" onclick="event.preventDefault(); document.getElementById('save-activity-details-form').submit();">Save Details</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</x-layout> 