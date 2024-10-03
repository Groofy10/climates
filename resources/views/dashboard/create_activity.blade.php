<x-layout>
    <link href="{{ asset('css/create_activity.css') }}" rel="stylesheet" />


    <div class="content">
        <div class="all-container">
            <div class="form">
                <div class="center">
                    <h1>Volunteer Event Creation</h1>

                    <form action="{{ route('dashboard.event.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="inputfield">
                            <div class="left">
                                <div class="rows">
                                    <div class="insider-row">
                                        <label class="labeltext">Event Title</label><span class="required">*</span>
                                    </div>
                                    <input class="textbox" type="text" name="activityTitle" placeholder="e.g Vegetables, food, and water for Palestinian families" required>
                                </div>
                                <div class="rows">
                                    <div class="insider-row">
                                        <label class="labeltext">Event Capacity</label><span class="required">*</span>
                                    </div>
                                    <input class="textbox" type="number" name="activityCapacity" placeholder="e.g 100" required>
                                </div>
                                <div class="rows">
                                    <div class="insider-row">
                                        <label class="labeltext">Event Location</label><span class="required">*</span>
                                    </div>
                                    <input class="textbox" type="text" name="activityLocation" placeholder="e.g Binus Kemanggisan, Jl. Raya Kb. Jeruk No.27, RT.1/RW.9 " required>
                                </div>
                                <div class="rows">
                                    <div class="insider-row">
                                        <label for="formFile" class="form-label">Event Thumbnail</label><span class="required">*</span>
                                      </div>
                                      <input class="form-control" type="file" id="formFile" name="activityImage" accept="image/*" required>
                                    {{-- <div class="insider-row">
                                        <label class="labeltext">Event Thumbnail</label><span class="required">*</span>
                                    </div>
                                    <input type="file" name="activityImage" accept="image/*" required> --}}
                                </div>
                            </div>

                            <div class="right">
                                <div class="rows">
                                    <div class="insider-row">
                                        <label class="labeltext">Event Organizer</label><span class="required">*</span>
                                    </div>
                                    <input class="textbox" type="text" name="activityCreator" placeholder="Input Organization/Foundation Name" required>
                                </div>
                                <div class="rows">
                                    <div class="insider-row">
                                        <label class="labeltext">Event Date/Time</label><span class="required">*</span>
                                    </div>
                                    <div class="rowstartend">
                                        <input class="textboxDateTime" type="date" name="activityDate" required>
                                        <input class="textboxDateTime" type="time" name="activityTime" required>
                                    </div>
                                </div>
                                <div class="rowstartend">
                                    <div class="rows">
                                        <div class="insider-row">
                                            <label class="labeltext">Start Registration</label><span class="required">*</span>
                                        </div>
                                        <input class="textboxDateTime" type="date" name="activityStartRegistration" required>
                                    </div>
                                    <div class="rows">
                                        <div class="insider-row">
                                            <label class="labeltext">End Registration</label><span class="required">*</span>
                                        </div>
                                        <input class="textboxDateTime" type="date" name="activityEndRegistration" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="rows">
                            <div class="insider-row">
                                <label class="labeltext">Event Description</label><span class="required">*</span>
                            </div>
                            <textarea class="textboxdesc" name="activityDescription" required></textarea>
                        </div>
                        <div class="rows">
                            <div class="insider-row">
                                <label class="labeltext">Event Requirements</label><span class="required">*</span>
                            </div>
                            <textarea class="textboxreq" name="activityRequirements" placeholder="e.g 1. Berusia minimal 18 tahun." required></textarea>
                        </div>

                        <div class="errorMessage">
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

                        <div class="button">
                            <button type="submit" class="buttonRequest">Create Event</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>
