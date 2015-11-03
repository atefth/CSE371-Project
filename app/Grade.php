<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'grades';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['gpa', 'c_id', 's_id', 'u_id', 'sec', 'grade'];

    public function student()
    {
        return $this->belongsTo('User', 'u_id');
    }

    public function semester()
    {
        return $this->belongsTo('Semester', 's_id');
    }

    public function course()
    {
        return $this->belongsTo('Course', 'c_id');
    }
}
