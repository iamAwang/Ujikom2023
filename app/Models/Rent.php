<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    protected $table='rents';
    protected $fillable=['name','date','day','costume_id','user_id'];

    public function costume(){
        return $this->belongsTo(Costume::class);
    }
}
