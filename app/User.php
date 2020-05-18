<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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

    public function roles()
    {
        return $this->belongsToMany("App\Role");
    }

    public function autorizar($roles)
    {
        if($this->tieneMuchosRoles($roles)){
            return true;
        }
        abort(401, "No esta permito ver esat página");
    }

    public function tieneMuchosRoles($roles)
    {
        if(is_array($roles)){
            foreach ($roles as $rol) {
                if($this->tineRol($rol)){
                    return true;
                }
            }
        }else{
            if($this->tineRol($roles)){
                return true;
            }
        }
        return false;
    }

    public function tineRol($rol)
    {
        if($this->roles()->where("nombre", $rol)->first()){
            return true;
        }
        return false;
    }

}
