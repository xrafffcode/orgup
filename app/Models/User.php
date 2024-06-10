<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Get the admin that owns the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function admin()
    {
        return $this->hasOne(Admin::class);
    }

    /**
     * Get the instructor that owns the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function instructor()
    {
        return $this->hasOne(Instructor::class);
    }

    /**
     * Get the student that owns the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     *
     * */
    public function student()
    {
        return $this->hasOne(Student::class);
    }

    /**
     * Get the profile by the user role
     *
     */
    public function profile()
    {
        if ($this->hasRole('admin')) {
            return $this->admin()->first();
        }
    }
}
