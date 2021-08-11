<?php

namespace App\Containers\UserRegistration\UserContainer\Models;

use Tymon\JWTAuth\Contracts\JWTSubject;
use App\Ship\Parents\Models\Model;
use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserContainer extends Model implements JWTSubject
{
    // use HasFactory, Notifiable, HasApiTokens;
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
        'email_verified_at' => 'datetime'
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

    public function blogs()
    {
        //  return $this->hasMany(BlogModel::class, 'user_id');
        return $this->hasMany('C:\apiato-project\apiato\app\Containers\UserRegistration\UserContainer\Models\BlogModel', 'user_id');
    }
}
