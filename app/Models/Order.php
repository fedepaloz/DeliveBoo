<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function restaurant() {
        return $this->belongsTo('App\Models\Restaurant');
    }

    public function items() {
        return $this->belongsToMany('App\Models\Item');
    }
}
