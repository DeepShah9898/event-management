<?php

namespace App\Models;

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',  // ID of the user who registered
        'event_id', // ID of the event they registered for
        'ticket_type', // Type of ticket (if applicable)
        'quantity', // Number of tickets
        'payment_status', // Payment status
    ];

    // Relationship with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relationship with Event
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
