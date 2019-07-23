<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $fillable = ['place_name', 'palce_address', 'lat', 'lng'];

    function getDateForHumansAttribute(){
        return $this->created_at->diffForHumans();
    }
}
