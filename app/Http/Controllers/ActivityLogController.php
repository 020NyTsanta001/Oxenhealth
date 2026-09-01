<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ActivityLog;

class ActivityLogController extends Controller
{
    public function index()
    {
        $activityLogs = ActivityLog::where('user_id',auth()->id())->latest()->get();
        return view('activity.index', compact('activityLogs'));

    }
    public function store(Request $request)
    {
        $request->validate(['activity_type'=>'required|string','duration'=>'required|numeric|min:0','activity_date'=>'required|date',]);
        ActivityLog::create(['user_id'=>auth()->id(),'activity_type'=>$request->activity_type,'duration'=>$request->duration,'activity_date'=>$request->activity_date,]);
        return redirect()->back();

    }
    public function destroy(ActivityLog $activityLog)
    {
        if($activityLog->user_id !== auth()->id()){
            abort(403);
        }
        $activityLog->delete();
        return redirect()->back();
    }
}
