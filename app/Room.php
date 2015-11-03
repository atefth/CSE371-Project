<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'rooms';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'building', 'floor', 'seats'];

    public function courses()
    {
        return $this->belongsToMany('Course', 'schedules', 'r_id', 'c_id');
    }

    public function intervals()
    {
        return $this->belongsToMany('Interval', 'schedules', 'r_id', 'i_id');
    }

    public function semesters()
    {
        return $this->belongsToMany('Semester', 'schedules', 'r_id', 's_id');
    }

    public function students()
    {
        return $this->belongsToMany('User', 'schedules', 'r_id', 'u_id');
    }
}
