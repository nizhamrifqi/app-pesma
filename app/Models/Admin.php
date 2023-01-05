<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\AuthenticatesUsers;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;

    protected $guarded =[
        'id'
    ];

    public function getRouteKeyName()
    {
        return 'username';
    }

    // public $table = "admin";

    // protected $fillable = [
    //     'username', 'full_name' ,'password', 'img_admin'
    // ];
}
