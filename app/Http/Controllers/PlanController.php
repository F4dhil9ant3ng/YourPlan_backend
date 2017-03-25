<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Http\Requests\PlanRequest;

use App\Models\Plan;

class PlanController extends Controller
{
    public function __construct(Plan $plan) {
    	$this->plan = $plan;
    }

    public function index() {
    	$plans = $this->plan->where('id_user', '=' , 1)->get();

    	return response()->json($plans);
    }

    public function insert() {
    	$params = [
    		'id_user' => 1,
    		'plan_name' => 'Futsal',
    		'plan_place' => 'Hotel NEO Melawai',
    		'plan_address' => 'Jl. Panglima Polim Raya No.15, RT.3/RW.1, Melawai, Kebayoran Baru, South Jakarta City, Jakarta 12160',
    		'lat' => -6.245586,
    		'lng' => 106.798530,
    		'date' => '2017-03-25',
    		'time' => '13:00:00',
    		'description' => 'Have fun',
    		'done' => 'n'
    	];

    	$plan = $this->plan->create($params);

    	return response()->json($plan);
    }
}
