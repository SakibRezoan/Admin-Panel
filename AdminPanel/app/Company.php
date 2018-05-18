<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name','email','cmmi','branches', 'address', 'website', 'logo', 'type', 'license'
    ];

    protected $casts = [
        'branches' => 'array',
    ];
}
