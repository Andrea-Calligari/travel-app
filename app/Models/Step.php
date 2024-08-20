<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Step extends Model
{
    use HasFactory;
    protected $fillable = ['day_id','title', 'description','latitude','longitude'];
     public function day(){
        return $this->belongsTo(Day::class);
    }
}
