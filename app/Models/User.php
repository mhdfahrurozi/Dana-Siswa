<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = ['id'];

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

    public function tabungan(){
        return $this->hasOne(Tabungan::class);
    }
    public function deposit(){
        return $this->hasMany(Deposit::class);
    }
    public function penarikan(){
        return $this->hasMany(Penarikan::class);
    }
    public function notif(){
        return $this->hasMany(Notif::class);
    }

    //menghubungkan user (author) dengan post
    public function posts(){
        return $this->hasMany(Post::class);
    }
}
