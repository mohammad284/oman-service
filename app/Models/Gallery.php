<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;
    protected $fillable = [
        'provider_id',
        'image',
    ];

    public function provider ()
    {
        return $this->belongsTo(User::class,'provider_id','id');
    }
}
