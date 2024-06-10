<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Admin extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'avatar',
        'name',
    ];

    /**
     * Get the user that owns the Admin
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     *
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
