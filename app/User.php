<?php

namespace App;


use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;


class User extends Authenticatable
{   
    
    
        use SoftDeletes;
        use Notifiable;
        use Sortable;
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_name','email','first_name','last_name','address',
        'house_number','postal_number','city','phone_number','last_login_at',
        'last_login_ip','http_user_agent'
    ];

    public $sortable = ['user_name','email','first_name','last_name'];

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
    
    public function getFullName()
    {
    return "{$this->first_name} {$this->surname}";
    }
   
}
