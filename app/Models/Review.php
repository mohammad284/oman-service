<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $fillable = [
        'review',
        'user_id',
        'rate'
    ];

    public function details()
    {
        return $this->hasMany('App\Models\ReviewDetail','review_id','id');
    }
    public function images()
    {
        return $this->hasMany('App\Models\ReviewImage','review_id','id');
    }
}
