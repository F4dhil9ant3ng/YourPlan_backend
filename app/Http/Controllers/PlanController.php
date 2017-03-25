<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlanRequest;

use App\Models\Plan;

class PlanController extends Controller
{
    public function __construct(Plan $plan) {
    	$this->plan = $plan;
    }

    public function index($idUser) {
    	$plans = $this->plan->where('id_user', '=' , $idUser)->get();

    	return response()->json($plans);
    }

    public function insert(PlanRequest $planRequest) {
    	$params = [
    		'id_user' => $planRequest['id_user'],
    		'plan_name' => $planRequest['plan_name'],
    		'plan_place' => $planRequest['plan_place'],
    		'plan_address' => $planRequest['plan_address'],
    		'lat' => $planRequest['lat'],
    		'lng' => $planRequest['lng'],
            'time_to_prepare' => $planRequest['time_to_prepare'],
    		'date' => $planRequest['date'],
    		'time' => $planRequest['time'],
    		'description' => $planRequest['description'],
    		'done' => 'n'
    	];

    	$plan = $this->plan->create($params);

    	return response()->json($plan);
    }
}
