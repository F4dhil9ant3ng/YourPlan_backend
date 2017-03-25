<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Http\Requests\MeasureRequest;

use App\Models\Plan;

use App\Events\MeasureTime;

class MeasureTimeController extends Controller
{
    public function __construct(Plan $plan) {
    	$this->plan = $plan;
    }

    public function measure($idPlan, MeasureRequest $measureRequest) {
    	$viewedPlan = $this->plan->find($idPlan);

    	$originLatLng = $measureRequest['lat'] . ", " . $measureRequest['lng'];
    	$destinationLatLng = $viewedPlan['lat'] . ", " . $viewedPlan['lng'];

    	$url = "https://maps.googleapis.com/maps/api/distancematrix/json?mode=walking&origins=" . $originLatLng . "&destinations=" . $destinationLatLng . "&key=AIzaSyCTgFYquxmF1dJdH-r_HrXZkG49sKuglSM";
    	$url = str_replace(" ", "%20", $url);

        $responseJSON = file_get_contents($url);
        $response = json_decode($responseJSON, true);

        $returnArr = [];
        if($response['status'] == 'OK') {
            $planDateTime = $viewedPlan['date'] . " " . $viewedPlan['time'];
            $planTimeToPrepare = $viewedPlan['time_to_prepare'];

            $travelTime = $response['rows'][0]['elements'][0]['duration']['text'];
            $now = date("Y-m-d H:i:s");

            $estimatedArrivalDateTime = date("Y-m-d H:i:s", strtotime("+" . $travelTime, strtotime($now)));

            // set preparation time
            $spareDateTime = date("Y-m-d H:i:s", strtotime("-5 minutes", strtotime($planDateTime)));
            $timeToGo = date("Y-m-d H:i:s", strtotime("-" . $travelTime, strtotime($spareDateTime)));
            $reminderTimeToPrepare = date("Y-m-d H:i:s", strtotime("-" . $planTimeToPrepare, strtotime($timeToGo)));

            // check reminderTime
            $returnArr['timeToPrepare'] = 'no';
            if($now > date("Y-m-d H:i:s", strtotime("-2 minutes", strtotime($reminderTimeToPrepare))) && $now < date("Y-m-d H:i:s", strtotime("+2 minutes", strtotime($reminderTimeToPrepare)))) {
                $returnArr['timeToPrepare'] = 'yes';
            }

            // echo $now . " now\n";
            // echo $planDateTime . " planDateTime\n";
            // echo $reminderTimeToPrepare . " reminderTimeToPrepare\n";
            // echo $estimatedArrivalDateTime . " estimatedArrivalDateTime\n";

            // $returnArr['planDateTime'] = $planDateTime;
            // $returnArr['estimatedArrivalDateTime'] = $estimatedArrivalDateTime;

            if($now > $planDateTime) {
                $returnArr['status'] = "You are late for your " . $viewedPlan['plan_name'] . " plan";
            }else if($estimatedArrivalDateTime > $planDateTime) {
                // echo $planDateTime . " " . $estimatedArrivalDateTime . " " . $now;
                // echo "\n";
                $diffTime = ceil((strtotime($estimatedArrivalDateTime) - strtotime($planDateTime)) / 60);

                $returnArr['status'] = "You will be late for " . $diffTime . " minute(s)";
                // return;
            }else {
                $returnArr['status'] = "You are safe for the event";
            }
        }

        broadcast(new MeasureTime(json_encode($returnArr)));

        // return response()->json($returnArr);
        return ['status' => 'OKSIP'];
    }
}
