<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ParkingData extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "parking_data";
    protected $dates = ['deleted_at'];
    public function vehicle(){
        return $this->belongsTo(Vehicle::class);
    }
}
