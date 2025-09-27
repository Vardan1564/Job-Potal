<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class contactUsModel extends Model
{
    protected $table = 'contact_us';
    
    protected $fillable = [
        'name',
        'email',
        'password',
        'message',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Disable timestamps if you don't want automatic timestamp management
    // public $timestamps = false;
}
