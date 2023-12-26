<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
class PrivacyTerm extends Model
{
    use HasFactory;
    use Translatable;
    protected $fillable = [
        'img'
    ];

    public $translatedAttributes = ['privacy','term'];
}
