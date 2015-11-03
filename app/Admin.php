<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'admins';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'admin_id'];

    public function user()
    {
        return $this->belongsTo('Admin', 'id');
    }
}
