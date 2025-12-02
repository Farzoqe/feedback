<?php

namespace Farzoqe\Feedback\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    const STATUSES = [
        'Open',
        'Closed',
        'On Hold',
        'Paused',
        'Awaiting Customer Details',
        'Awaiting Response',
        'Cancelled',
    ];
    protected $guarded = [];

    function user()
    {
        return $this->belongsTo(User::class);
    }
}
