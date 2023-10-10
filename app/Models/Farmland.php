<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Farmland extends Model
{
    use HasFactory;

    protected $fillable = [
        'additionalinformation',
        'firstname',
        'lastname',
        'companyname',
        'address',
        'email',
        'phone',
        'farmlandLat',
        'farmlandLng'
    ];
}
