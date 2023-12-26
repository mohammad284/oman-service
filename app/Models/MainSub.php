<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainSub extends Model
{
    use HasFactory;
    protected $fillable = [
        'main_id',
        'sub_id'
    ];
}
