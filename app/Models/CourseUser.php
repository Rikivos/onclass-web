<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Foundation\Auth\User;

class CourseUser extends Pivot
{
    protected $table = 'course_user';

    protected $fillable = [
        'user_id',
        'course_id',
    ];

    // Define the relationship methods
}
