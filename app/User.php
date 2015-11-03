<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
AuthorizableContract,
CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['f_name', 'l_name', 'email', 'password', 'semester_id', 'birthday', 'phone', 'address', 'blood_group'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function coursesOffered()
    {
        return $this->belongsToMany('Course', 'course_allocations', 'u_id', 'c_id');
    }

    public function coursesTaken()
    {
        return $this->belongsToMany('Course', 'schedules', 'u_id', 'c_id');
    }

    public function grades()
    {
        return $this->hasMany('Grade', 'u_id');
    }

    public function schedules()
    {
        return $this->belongsToMany('Interval', 'schedules', 'u_id', 'i_id');
    }

    public function semestersAsStudent()
    {
        return $this->belongsToMany('Semester', 'schedules', 'u_id', 's_id');
    }

    public function semestersAsFaculty()
    {
        return $this->belongsToMany('Semester', 'course_allocations', 'u_id', 's_id');
    }

    public function rooms()
    {
        return $this->belongsToMany('Room', 'schedules', 'u_id', 'r_id');
    }
}
