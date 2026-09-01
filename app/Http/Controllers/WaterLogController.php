<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WaterLog;

class WaterLogController extends Controller
{
    public function index()
    {
        $waterLogs = WaterLog::where('user_id',auth()->id())->latest()->get();
        return view('water.index', compact('waterLogs'));

    }
    public function store(Request $request)
    {
        $request->validate(['litre'=>'required|numeric|min:0|max:24','water_date'=>'required|date',]);
        WaterLog::create(['user_id'=>auth()->id(),'litre'=>$request->litre,'water_date'=>$request->water_date,]);
        return redirect()->back();

    }
    public function destroy(WaterLog $waterLog)
    {
        if($waterLog->user_id !== auth()->id()){
            abort(403);
        }
        $waterLog->delete();
        return redirect()->back();
    }
}
