<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'avatar',
        'name',
        'username',
    ];

    /**
     * Get the user that owns the student.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the enrollments for the student.
     *
     */
    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    public function isEnrolled($id)
    {
        return $this->enrollments()->where('course_id', $id)->exists();
    }

    public function isEnrolledInAnyCourse()
    {
        return $this->enrollments()->exists();
    }

    /**
     * Get the avatar attribute.
     *
     * @param  string  $value
     * @return string
     */
    public function getAvatarAttribute($value)
    {
        // return asset('storage/' . $value);

        if ($value) {
            return asset('storage/' . $value);
        } else {
            return url('https://ui-avatars.com/api/?name=' . $this->name . '&color=7F9CF5&background=EBF4FF');
        }
    }
}
