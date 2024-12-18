<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $primaryKey = 'module_id';
    protected $fillable = ['module_title', 'content', 'course_id', 'file_path'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
