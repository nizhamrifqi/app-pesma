<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $guarded =[
        'id'
    ];

    public function student()
    {
        return $this->belongsTo(student::class);
    }
    
    public function permit()
    {
        return $this->belongsTo(permit::class);
    }
}
