<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model  implements AuthenticatableContract
{   
    use HasFactory, Authenticatable;
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
}
