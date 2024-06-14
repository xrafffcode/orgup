<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'theard_id',
        'parent_id',
        'student_id',
        'comment',
    ];

    public function theard()
    {
        return $this->belongsTo(Theard::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }
}
