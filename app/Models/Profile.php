<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Profile extends Model
{
    protected $fillable = [
        'skill',
        'location',
        'user_id',
        'education',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
