<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/*
 * @property string medicina
 */

class Medicina extends Model{

    //protected $fillable = ['nombre','direccion'];
	protected $guarded = ['idmedicina'];
    public $timestamps = false;
    //protected $table = tabla;
    //protected $primaryKey = '';
}