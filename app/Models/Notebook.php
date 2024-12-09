<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notebook extends Model
{
    protected $fillable = [
        'name',
        'company',
        'phone',
        'email',
        'date_of_birth',
        'url'
    ];
}
