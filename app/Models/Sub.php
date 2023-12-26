<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
class Sub extends Model
{
    use HasFactory;
    use Translatable;
    protected $fillable = [
        'img' ,
    ];
    public $translatedAttributes = ['name'];
    public function mains()
    {
        return $this->belongsToMany(Main::class, 'main_subs');
    }
    public function questions()
    {
        return $this->belongsToMany(Question::class, 'question_subs');
    }
}
