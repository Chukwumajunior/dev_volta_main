<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\CareerApplication;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['name', 'email', 'phone', 'role', 'password'];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = ['email_verified_at' => 'datetime'];

    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function isWriter()
    {
        return $this->role === 'writer';
    }

    public function careerApplications()
    {
        return $this->hasMany(CareerApplication::class);
    }
}
