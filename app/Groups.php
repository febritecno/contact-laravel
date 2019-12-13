<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Groups extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'group_name', 'detail',
    ];


    protected $hidden = [
        'id',
    ];

    public function contact()
    {
        return $this->belongsTo('App\Contact', 'groups_id');
    }
}
