<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    use HasFactory;


    protected $guarded =[];
    // protected  $primaryKey= 'nim';
    
    // public function incrementing (){
        
    //     false;
    // }

    public function getRouteKeyName()
    {
        return 'nim';
    }

    public function room()
    {
        return $this->belongsTo(room::class);
    }

    public function faculty()
    {
        return $this->belongsTo(faculty::class);
    }
    
    public function parent()
    {
        return $this->belongsTo(studentparent::class);
    }

}
