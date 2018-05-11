<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name','email','cmmi','branches', 'address', 'website', 'logo', 'type', 'licensed'
    ];

    protected $casts = [
        'branches' => 'array',
    ];
}
