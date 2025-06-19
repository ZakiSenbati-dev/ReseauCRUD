<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Profile extends User implements MustVerifyEmail
{
    use HasFactory;
    use SoftDeletes;
    use Notifiable;

    protected $date =['created_at'];
    protected $fillable = ([
        'name',
        'email',
        'password',
        'bio',
        'image',
        'email_verified_at'
    ]);

    public function getImageAttribute($value){
        return $value??'profile/Profile-img.png';
    }

    public function publications(){
        return $this->hasMany(Publication::class);
    }
}

