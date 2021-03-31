<?php

namespace App;

use Laravel\Passport\HasApiTokens;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function pakar() {
        return $this->hasOne('App\Models\Pakar');
    }

    public function saldo() {
        return $this->hasOne('App\Models\Saldo');
    }

    public function participant() {
        return $this->hasOne('App\Models\Participant');
    }

    public function getId()
    {
        return $this->id;
    }

    public static $rules = [
        'name' => 'required|string|min:3|max:35',
        'email' => 'required|unique:email',
        'role' => 'required',
        'password' => 'required',
    ];

}
