<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SleepLog;

class SleepLogController extends Controller
{
    public function index()
    {
        $sleepLogs = SleepLog::where('user_id',auth()->id())->latest()->get();
        return view('sleep.index', compact('sleepLogs'));

    }
    public function store(Request $request)
    {
        $request->validate(['hours'=>'required|numeric|min:0|max:24','sleep_date'=>'required|date',]);
        SleepLog::create(['user_id'=>auth()->id(),'hours'=>$request->hours,'sleep_date'=>$request->sleep_date,]);
        return redirect()->back();

    }
    public function destroy(SleepLog $sleepLog)
    {
        if($sleepLog->user_id !== auth()->id()){
            abort(403);
        }
        $sleepLog->delete();
        return redirect()->back();
    }
}
