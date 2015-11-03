<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interval extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'intervals';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['start', 'end', 'duration', 'day'];

    public function courses()
    {
        return $this->belongsToMany('Course', 'schedules', 'i_id', 'c_id');
    }

    public function students()
    {
        return $this->belongsToMany('User', 'schedules', 'i_id', 'u_id');
    }

    public function faculties()
    {
        return $this->belongsToMany('User', 'course_allocations', 'i_id', 'u_id');
    }

    public function rooms()
    {
        return $this->belongsToMany('Room', 'schedules', 'i_id', 'r_id');
    }
}
