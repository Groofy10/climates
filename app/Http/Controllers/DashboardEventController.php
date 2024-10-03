<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DashboardEventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("dashboard/event-dashboard", [
            'activities' => Activity::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard/create_activity');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request->file('activityImage')->stor e('activity-images', 'public');
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
            $data['activityImage'] = $request->file('activityImage')->store('activity-images', 'public');
        }




        Activity::create($data);
        return redirect(route('dashboard.event'))->with('success', 'Activity Created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Activity $activity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $activity = Activity::find($id);
        return view("dashboard/edit-activity", [
            'activity' => $activity,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $activity = Activity::find($id);

        $validate = [
            'activityTitle' => 'required',
            'activityDescription' => 'required',
            'activityCapacity' => 'required|integer',
            'activityLocation' => 'required',
            'activityRequirements' => 'required',
            'activityCreator' => 'required|string|max:255',
            'activityDate' => 'required|date|after:today',
            'activityStartRegistration' => 'required|date|after_or_equal:today',
            'activityEndRegistration' => 'required|date|after:start_date',
            'activityImage' => 'image|file|max:4096'
        ];

        if ($request->activityTime != $activity->activityTime) {
            $validate['activityTime'] = 'required|date_format:H:i';
        }

        $validated = $request->validate($validate, [
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


        Activity::where('id', $activity->id)->update($validated);
        return redirect('/dashboard/events')->with('success', 'Activity has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {


        $activity = Activity::find($id);

        if ($activity->activityImage) {

            $imagePath = public_path('storage/' . $activity->activityImage);


            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $activity->delete();

        return redirect(route('dashboard.event'))->with('success', 'Activity has been deleted!');
    }
}
