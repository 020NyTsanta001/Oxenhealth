<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SleepLog;
use App\Models\WaterLog;
use App\Models\ActivityLog;

class DashboardController extends Controller
{
    public function index()
    {
        $sleepLogs = SleepLog::where('user_id',auth()->id())->latest()->get();
        $averageSleep = round($sleepLogs->avg('hours'), );
        $lastSleep = $sleepLogs->first();
        $totalSleepLogs = $sleepLogs->sum('hours');
        $chartSleepData = SleepLog::where('user_id',auth()->id())->latest('sleep_date','desc')->take(7)->get()->sortBy('sleep_date')->values();


        if ($averageSleep >= 8){
            $insight = "Excellent rythme du sommeil";
        }
        elseif ($averageSleep >= 6){
            $insight = "Bon équilibre du sommeil";
        }
        elseif ($averageSleep > 0){
            $insight = "Vous dormez moins de 7 heures en moyenne";
        }
        else{
            $insight = "Aucune donnée disponible";
        }

        $waterLogs = WaterLog::where('user_id',auth()->id())->latest()->get();
        $averageWater = round($waterLogs->avg('litre'), 1);
        $lastWater = $waterLogs->first();
        $totalWaterLogs = $waterLogs->sum('litre');
        $chartWaterData = WaterLog::where('user_id',auth()->id())->latest('water_date','desc')->take(7)->get()->sortBy('water_date')->values();

        if ($totalWaterLogs >= 14){
            $insight2 = "Très bonne hydratation";
        }
        elseif ($totalWaterLogs >= 7){
            $insight2 = "Hydratation moyenne";
        }
        elseif ($totalWaterLogs < 7 && $totalWaterLogs > 0){
            $insight2 = "Risque de deshydratation à long terme";
        }
        else{
            $insight2 = "Aucune donnée disponible";
        }

        $activityLogs = ActivityLog::where('user_id',auth()->id())->latest()->get();
        $lastActivity = $activityLogs->first();
        $totalActivityLogs = $activityLogs->where('activity_type', '!=','Aucun','aucun')->count('activity_type');
        $totalDuration = $activityLogs->where('activity_type', '!=','Aucun','aucun')->sum('duration');
        $maxDuration = $activityLogs->max('duration');
        $chartActivityData = ActivityLog::where('user_id',auth()->id())->latest('activity_date','desc')->take(7)->get()->sortBy('activity_date')->values();

        if ($totalActivityLogs === 0){
            $insight3 = "Aucune données";
        }
        elseif ($totalActivityLogs < 4){
            $insight3 = "Il faut un effort";
        }
        elseif ($totalActivityLogs < 7){
            $insight3 = "Bonne activité physique";
        }
       
        else{
            $insight3 = "Meilleure activité quotidienne";
        }

        //
        //
        if ($averageSleep >= 8){
            $sleepScore = 40;
        }
        elseif ($averageSleep < 8 && $averageSleep >= 6){
            $sleepScore = 30;
        }
        elseif ($averageSleep < 6 && $averageSleep >= 4){
            $sleepScore = 20;
        }
        else{
            $sleepScore = 0;
        }


        if ($averageWater >= 2){
            $waterScore = 30;
        }
        elseif ($averageWater < 2 && $averageWater >= 1){
            $waterScore = 20;
        }
        elseif ($averageWater < 1 && $averageWater >= 0.5){
            $waterScore = 10;
        }
        else{
            $waterScore = 0;
        }


        if ($totalActivityLogs === 0){
            $activityScore = 0;
        }
        elseif ($totalActivityLogs < 4){
            $activityScore = 10;
        }
        elseif ($totalActivityLogs < 6){
            $activityScore = 20;
        }
        else{
            $activityScore = 30;
        }

        $healthScore = $activityScore + $waterScore + $sleepScore;

        if ($healthScore >= 80) {
            $healthInsight = "Votre hygiène de vie est très bonne. Continuez ainsi !";
        }
        elseif ($healthScore >= 60) {
            $healthInsight = "Votre hygiène de vie est globalement satisfaisante, mais certains points peuvent encore être améliorés.";
        }
        elseif ($healthScore >= 40) {
            $healthInsight = "Votre hygiène de vie peut être améliorée. Portez une attention particulière à vos habitudes quotidiennes.";
        }
        elseif ($healthScore == 0) {
            $healthInsight = "Aucune donnée disponible";
        }
        else {
            $healthInsight = "Vos habitudes actuelles nécessitent davantage d'attention. Essayez d'améliorer progressivement votre sommeil, votre hydratation et votre activité.";
        }





        return view('dashboard', compact(
            'averageSleep','lastSleep','totalSleepLogs','insight','averageWater','lastWater','totalWaterLogs','insight2','totalActivityLogs','insight3','totalDuration','maxDuration','lastActivity','chartSleepData','chartWaterData','chartActivityData','sleepScore','waterScore','activityScore','healthScore','healthInsight'
        ));

    }
}
