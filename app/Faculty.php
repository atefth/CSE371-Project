<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'faculties';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'faculty_id'];

    public function user()
    {
        return $this->belongsTo('User', 'id');
    }
}
