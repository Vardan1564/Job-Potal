<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\JobPostModel;
class applyJobModel extends Model
{
    protected $table = 'applyjob';
    
    protected $fillable = [
        'C_ID',
        'J_ID',
        'U_ID',
        'status',
        'user_name',
        'user_email',
        'resume',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Disable timestamps if you don't want automatic timestamp management
    // public $timestamps = false;
//     public function jobPost()
// {
//     return $this->belongsTo(JobPostModel::class, 'J_ID', 'id');
// }
}
