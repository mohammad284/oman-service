<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
class SubTranslation extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'locale',
        'sub_id'
    ];
}
