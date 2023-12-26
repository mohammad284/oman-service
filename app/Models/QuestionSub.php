<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionSub extends Model
{
    use HasFactory;
    protected $fillable =[
        'sub_id',
        'question_id',
    ];
    
}
