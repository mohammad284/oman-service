<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
class Answer extends Model
{
    use HasFactory;
    use Translatable;
    protected $fillable = [
        'img'
    ];
    public $translatedAttributes = ['answer'];

    public function questions()
    {
        return $this->belongsToMany(Question::class, 'answer_questions');
    }
}
