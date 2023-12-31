<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
class PrivacyTermTranslation extends Model
{
    use HasFactory;
    protected $fillable = [
        'privacy',
        'term',
        'locale'
    ];
}
