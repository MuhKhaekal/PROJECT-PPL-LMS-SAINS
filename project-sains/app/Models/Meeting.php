<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    use HasFactory;

    protected $fillable = ['meeting_name', 'meeting_topic', 'description', 'course_id'];
    protected $table = 'meeting';

    public function presences()
    {
        return $this->hasMany(Presence::class);
    }
    public function courses()
    {
        return $this->hasMany(Course::class);
    }
    public function materials()
    {
        return $this->hasMany(Material::class);
    }
    public function assignment()
    {
        return $this->hasMany(Assignment::class);
    }
}
