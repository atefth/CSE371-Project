<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'students';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'student_id', 'major', 'minor', 'cgpa'];

    public function user()
    {
        return $this->belongsTo('User', 'id');
    }
}
