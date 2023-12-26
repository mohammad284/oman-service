<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainProvider extends Model
{
    use HasFactory;
    protected $fillable = [
        'main_id',
        'provider_id'
    ];
}
