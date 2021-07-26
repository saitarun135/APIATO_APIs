<?php

namespace App\Containers\UserRegistration\UserContainer\Models;
use Tymon\JWTAuth\Contracts\JWTSubject;
use App\Ship\Parents\Models\Model;

class UserContainer extends Model implements JWTSubject
{
    protected $fillable = [
        'fullName',
        'email',
        'password',
        'mobile'
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
    protected string $resourceKey = 'UserContainer';
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
