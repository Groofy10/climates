<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\User;
use App\Repositories\ActivityRepository;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    protected $activityRepo;

    public function __construct(ActivityRepository $activityRepo)
    {
        $this->activityRepo = $activityRepo;
    }

    public function index()
    {
        return Activity::all();
    }

    public function ongoing()
    {
        return Activity::where('activity_status', 'On Going')->get();
    }

    public function show($id)
    {
        return Activity::find($id);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'activityTitle' => 'required',
            'activityDescription' => 'required',
            'activityCapacity' => 'required|integer',
            'activityLocation' => 'required',
            'activityRequirements' => 'required',
            'activityCreator' => 'required|string|max:255',
            'activityDate' => 'required|date|after:today',
            'activityTime' => 'required|date_format:H:i',
            'activityStartRegistration' => 'required|date|after_or_equal:today',
            'activityEndRegistration' => 'required|date|after:start_date',
            'activityImage' => 'required|image|file|max:4096'
        ], [
            'activityTitle.required' => 'Please enter the activity title.',
            'activityDescription.required' => 'Please provide a description for the activity.',
            'activityCapacity.required' => 'Please enter the activity capacity.',
            'activityCapacity.integer' => 'The activity capacity must be a valid number.',
            'activityLocation.required' => 'Please specify the activity location.',
            'activityRequirements.required' => 'Please list the activity requirements.',
            'activityCreator.required' => 'Please provide the creator name.',
            'activityDate.required' => 'Please specify the activity date.',
            'activityDate.after' => 'The activity date must be a future date.',
            'activityTime.required' => 'Please specify the activity time.',
            'activityTime.date_format' => 'The activity time must be in the format HH:MM.',
            'activityStartRegistarion.required' => 'Please specify the registration start date.',
            'activityStartRegistarion.after_or_equal' => 'The registration start date must be today or in the future.',
            'activityEndRegistration.required' => 'Please specify the registration end date.',
            'activityEndRegistration.after' => 'The registration end date must be after the registration start date.',
            'activityImage.required' => 'Please upload an activity image.',
            'activityImage.image' => 'The uploaded file must be an image.',
        ]);

        if ($request->file('activityImage')) {
            $validatedData['activityImage'] = $request->file('activityImage')->store('activity-images');
        }


        Activity::create($data);
        return redirect(route('admin.dashboard'))->with('success', 'Activity Created!');
    }

    public function deleteThumbnail($id)
    {
        $activity = $this->show($id);
        if ($activity) {
            $activity->activity_image = null;
            return $activity->save();
        }
        return false;
    }

    public function join(Request $request)
    {

        $request->validate([
            'user_id' => 'required|exists:users,id',
            'activity_id' => 'required|exists:activities,id',
        ]);


        $activity = Activity::find($request->activity_id);
        $user = User::find($request->user_id);


        if ($user->verifStatus === 'Pending') {
            return redirect()->back()->with('error', 'Your account needs to be verified!');
        }

        if ($user->verifStatus === 'Not Verified') {
            return redirect()->back()->with('error', 'Please verify your account first!');
        }

        if ($activity->users()->where('id', $request->user_id)->exists()) {
            return redirect()->back()->with('error', 'You have already joined this activity.');
        }

        if ($activity->activityCurrentParticipants >= $activity->capacity) {
            return redirect()->back()->with('error', 'This activity is already at full capacity.');
        }


        $activity->users()->attach($request->user_id);


        $activity->increment('activityCurrentParticipants');


        return redirect()->route('volunteer.detail', $activity->id)->with('success', 'You have successfully joined the activity.');
    }

    public function leave(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'activity_id' => 'required|exists:activities,id',
        ]);

        $activity = Activity::find($request->activity_id);

        // Cek apakah pengguna sudah bergabung dengan aktivitas
        if (!$activity->users()->where('user_id', $request->user_id)->exists()) {
            return redirect()->back()->with('error', 'You have not joined this activity.');
        }

        // Hapus keanggotaan pengguna dari aktivitas
        $activity->users()->detach($request->user_id);

        // Kurangi jumlah peserta saat ini
        $activity->decrement('activityCurrentParticipants');

        return redirect()->route('volunteer.detail', $activity->id)->with('success', 'You have successfully left the activity.');
    }
}
