<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Order extends Model
{
    protected $fillable = ['id', 'name', 'email', 'phone', 'address', 'status'];

    public function book()
    {
        return $this->belongsToMany('App\Book', 'order_items')->withPivot('quantity');
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('m-d-Y');
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('m-d-Y');
    }
}
