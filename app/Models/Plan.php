<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
	protected $table = "plan";
    protected $fillable = ['id_user', 'plan_name', 'plan_place', 'plan_address', 'lat', 'lng', 'date', 'time', 'description', 'done'];
    public $timestamps = false;
}
