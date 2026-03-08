<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationWindow extends Model
{
    use HasFactory;

    protected $fillable = [
        'batch', 
        'start_date', 
        'end_date'
    ];

    public static function getActiveBatch()
    {
        $currentDate = now();
        return self::where('start_date', '<=', $currentDate)
                    ->where('end_date', '>=', $currentDate)
                    ->first();
    }
    public function setBatchAttribute($value)
    {
        $this->attributes['batch'] = strtoupper($value);
    }
}
