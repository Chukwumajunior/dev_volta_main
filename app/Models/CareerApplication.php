<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CareerApplication extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'paid',
        'number',
        'career',
        'batch',
        'gender',
        'residential_city',
        'age',
        'employment_status',
        'user_id',
        'payment_confirmed_at', 
        'messages',
    ];
    
    // Define the relationship with the User model
    protected $casts = [
        'payment_confirmed_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
