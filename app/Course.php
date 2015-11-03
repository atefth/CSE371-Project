<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'courses';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'code', 'description', 'url', 'credits'];

    public function grades()
    {
        return $this->hasMany('Grade', 'c_id');
    }

    public function students()
    {
        return $this->belongsToMany('User', 'schedules', 'c_id', 'u_id');
    }

    public function faculties()
    {
        return $this->belongsToMany('User', 'course_allocations', 'c_id', 'u_id');
    }

    public function schedules()
    {
        return $this->belongsToMany('Interval', 'schedules', 'c_id', 'i_id');
    }

    public function rooms()
    {
        return $this->belongsToMany('Room', 'schedules', 'c_id', 'r_id');
    }
}
