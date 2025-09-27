<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class educationsModel extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     */
    protected $table = 'educations';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'user_id',
        'university_name',
        'degree',
        's_date',
        'e_date',
    ];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        's_date' => 'date',
        'e_date' => 'date',
    ];

    /**
     * Get the user that owns this education record.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
