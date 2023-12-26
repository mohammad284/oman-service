<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;
    protected $fillable = [
        'provider_id',
        'type', // 1 : CR , 2 : Professional certificate
        'certificate'
    ];
    public function provider ()
    {
        return $this->belongsTo(User::class,'provider_id','id');
    }
}
