<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Theard extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'student_id',
        'title',
        'content',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function getExcerptAttribute()
    {
        return substr($this->content, 0, 100) . '...';
    }
}
