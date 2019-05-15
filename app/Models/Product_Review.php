<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product_Review extends Model
{
    protected $fillable = [
        'rating',
        'description',
    ];

    public function user()
    {
    	return $this->belongsTo('App\User', 'user_id');
    }
}
