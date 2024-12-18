<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Course extends Model
{
    use HasFactory, Sluggable;

    protected $table = 'courses';

    protected $primaryKey = 'course_id';

    public $timestamps = true;

    protected $fillable = [
        'course_title',
        'course_slug',
        'mentor_id',
    ];

    public function sluggable(): array
    {
        return [
            'course_slug' => [
                'source' => 'course_title'
            ]
        ];
    }


    //relation
    public function mentor()
    {
        return $this->belongsTo(User::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class)
            ->withTimestamps();
    }
}
