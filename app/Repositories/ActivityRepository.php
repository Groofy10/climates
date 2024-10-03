<?php

namespace App\Repositories;

use App\Models\Activity;

class ActivityRepository
{
    public function getAllActivities()
    {
        return Activity::all();
    }

    public function getOngoingActivities()
    {
        return Activity::where('activity_status', 'On Going')->get();
    }

    public function getActivityDetail($id)
    {
        return Activity::find($id);
    }

    public function createActivity($data)
    {
        return Activity::create($data);
    }

    public function updateActivity($id, $data)
    {
        $activity = Activity::find($id);
        return $activity ? $activity->update($data) : null;
    }

    public function deleteThumbnail($id)
    {
        $activity = $this->getActivityDetail($id);
        if ($activity) {
            $activity->activity_image = null;
            return $activity->save();
        }
        return false;
    }
}
