<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
class Question extends Model
{
    use HasFactory;
    use Translatable;
    protected $fillable = [
        'img'
    ];
    public $translatedAttributes = ['question'];

    public function subs()
    {
        return $this->belongsToMany(Sub::class, 'question_subs');
    }
    public function answers()
    {
        return $this->belongsToMany(Answer::class, 'answer_questions');
    }
}
