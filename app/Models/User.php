<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;


    public function role() {
        /**
         * Get the role for this
         * user
         */
        return $this->belongsTo(Role::class)->first();
    }

    public function is_admin($super=false){
        /**
         * Is this user admin or super admin?
         */
        return $super ? $this->role()->name == "Super Admin" :  in_array($this->role()->name, ["Admin", "Super Admin"]);
    }

    /**
     * Ensure the password is hashed
     * before it is stored
     */
    public function setPasswordAttribute($password)
    {   
       $this->attributes['password'] = bcrypt($password);
    }

    /**
     * Retrieve the name of the user
     * and automatically capitalize it
     */
    public function getNameAttribute($value){
        return ucfirst($value);
    }
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
