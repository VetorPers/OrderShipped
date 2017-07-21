<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id', 'good_name', 'good_price'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
