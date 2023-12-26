<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Main extends Model
{
    use HasFactory;
    use Translatable;
    protected $fillable = [
        'img' ,
    ];
    public $translatedAttributes = ['name'];
    
    public function subs()
    {
        return $this->belongsToMany(Sub::class, 'main_subs');
    }

    public function providers()
    {
        return $this->belongsToMany(User::class, 'main_providers', 'provider_id','main_id');
    }
}
