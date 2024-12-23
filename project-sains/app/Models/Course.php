<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = ['course_name', 'faculty_id'];
    protected $table = 'course';

    public function faculty(){
        return $this->belongsTo(Faculty::class);
    }
    
    public function presences()
    {
        return $this->hasMany(Presence::class);
    }
    public function groups()
    {
        return $this->belongsTo(PraktikanGroup::class);
    }

    public function meetings()
    {
        return $this->belongsTo(Meeting::class);
    }

    public function materials()
    {
        return $this->hasMany(Material::class);
    }
    public function assignment()
    {
        return $this->hasMany(Assignment::class);
    }
    public function praktikangroups()
    {
    return $this->hasMany(PraktikanGroup::class, 'course_id');
    }

}
