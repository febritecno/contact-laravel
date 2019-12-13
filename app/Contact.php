<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'avatar', 'first_name', 'last_name', 'address', 'city', 'zip', 'country', 'email', 'phone', 'note', 'groups_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'groups_id',
    ];

    public function groups()
    {
        return $this->hasMany('App\Groups');
    }
}
