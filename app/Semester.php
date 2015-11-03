<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'semesters';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'division', 'year'];

    public function courses()
    {
        return $this->belongsToMany('Course', 'schedules', 'c_id', 's_id');
    }

    public function students()
    {
        return $this->belongsToMany('User', 'schedules', 'u_id', 's_id');
    }

    public function faculties()
    {
        return $this->belongsToMany('User', 'course_allocations', 'u_id', 's_id');
    }

    public function grades()
    {
        return $this->hasMany('Grade', 's_id');
    }
}
