<?php

// app/Models/Sponsor.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'website',
        'logo',
        'email',
        'phone',
        'address',
        'description',
        'social_media',
        'status',
    ];

    // protected $casts = [
    //     'social_media' => 'array', // Cast social_media as an array
    // ];
}
