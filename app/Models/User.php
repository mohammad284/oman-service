<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $guard = "vendor";
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'company_name',
        'email',
        'password',
        'type', // user , provider
        'phone',
        'address' ,
        'lan',
        'lat',
        'status', // 0 => request , 1 => active , 2 => blocked 
        'image',
        'experience'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
    // شو بيشتغل 
    public function mains()
    {
        return $this->belongsToMany(Main::class, 'main_providers');
    }
    // معرض الصور ان وجد
    public function gallery ()
    {
        return $this->hasMany(Gallery::class,'provider_id','id');
    }
    // الشهادات الحرفيه ان وجد
    public function certificates ()
    {
        return $this->hasMany(Certificate::class,'provider_id','id');
    }
    
}
