<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loans extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstname',
        'middlename',
        'lastname',
        'email',
        'contact',
        'drivers_license'
    ];

    
}