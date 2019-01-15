<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Book extends Model
{
    public $fillable = ['id', 'title', 'author', 'summary', 'price', 'category_id', 'cover'];

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('m-d-Y');
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('m-d-Y');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function order()
    {
        return $this->belongsToMany('App\Order', 'order_items')->withPivot('quantity');
    }

}
