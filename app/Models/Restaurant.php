<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $fillable = ['name', 'image', 'address', 'vat_number', 'phone', 'opening_time', 'closure_time', 'min_order', 'delivery_cost', 'visible'];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function items() {
        return $this->hasMany('App\Models\Item');
    }

    public function orders() {
        return $this->hasMany('App\Models\Order');
    }

    public function categories() {
        return $this->belongsToMany('App\Models\Category');
    }
}
