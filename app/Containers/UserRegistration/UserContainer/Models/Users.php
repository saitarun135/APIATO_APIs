<?php

namespace App\Containers\UserRegistration\UserContainer\Models;

use App\Ship\Parents\Models\Model;

class Users extends Model
{
    protected $fillable = [
        'name','email','password','birth','gender','device','platform','is_admin'
    ];

    protected $attributes = [

    ];

    protected $hidden = [

    ];

    protected $casts = [

    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'Users';
}
