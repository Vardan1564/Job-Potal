<?php

namespace App\Models;
use App\Models\applyJobModel;
use Illuminate\Database\Eloquent\Model;

class jobPostModel extends Model
{
    protected $table = 'jobpost';

    protected $fillable = [
        'company_id',
        'jobtitle',
        'city',
        'state',
        'jobtype',
        'experience_level',
        'job_description',
        'qualifications',
        'company_name',
        'job_deadline',
        'salary_range',
        'email',
        'active_or_not',
    ];

//     public function applications()
// {
//     return $this->hasMany(applyJobModel::class, 'J_ID', 'id');
// }
}
