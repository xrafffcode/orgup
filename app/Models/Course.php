<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'instructor_id',
        'thumbnail',
        'title',
        'slug',
        'description',
    ];

    public function getThumbnailAttribute($value)
    {
        return asset('storage/' . $value);
    }

    public function instructor()
    {
        return $this->belongsTo(Instructor::class);
    }

    public function lessons()
    {
        return $this->hasMany(CourseLesson::class);
    }
}
