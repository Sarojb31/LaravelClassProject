<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model


{

	public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class,'donated_by');
    }
}
