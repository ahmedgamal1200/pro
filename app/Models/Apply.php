<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Apply extends Model
{
    protected $fillable = [
        'image', 'name', 'type', 'requirements', 'job_title',
    ];
}
