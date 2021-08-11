<?php

namespace App\Containers\UserRegistration\UserContainer\Models;

use App\Ship\Parents\Models\Model;

class BlogModel extends Model
{
    protected $table='blogs_table';
    protected $fillable = [
        'name','price','image','country','rating','description','user_id'
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
    protected string $resourceKey = 'BlogModel';
    public function user(){
        //  return $this->belongsTo(UserContainer::class);
        return $this->belongsTo('C:\apiato-project\apiato\app\Containers\UserRegistration\UserContainer\Models\UserContainer.php','user_id');
    }
}
