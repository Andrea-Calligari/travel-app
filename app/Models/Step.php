<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Step extends Model
{
    use HasFactory;
    protected $fillable = ['day_id', 'title', 'description', 'latitude', 'longitude'];
    public static $rules = [
        'latitude' => 'required|numeric|between:-90,90',
        'longitude' => 'required|numeric|between:-180,180',
    ];
    public function day()
    {
        return $this->belongsTo(Day::class);
    }
}
