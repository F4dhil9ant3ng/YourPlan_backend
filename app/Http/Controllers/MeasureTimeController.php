<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Http\Requests\MeasureRequest;

use App\Models\Plan;

class MeasureTimeController extends Controller
{
    public function __construct(Plan $plan) {
    	$this->plan = $plan;
    }

    public function measure(MeasureRequest $measureRequest) {
    	// $viewedPlan = $this->plan->find($idPlan);

    	// $originLat = $measureRequest['lat'] . ", " . $measureRequest['lng'];
    	// $destinationLat = $viewedPlan['lat'] . ", " . $viewedPlan['lng'];

    	$url = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=Washington,DC&destinations=New+York+City,NY&key=AIzaSyCTgFYquxmF1dJdH-r_HrXZkG49sKuglSM";
    	$url = str_replace(" ", "%20", $url);

    	// return $destinationLat;
    }
}
