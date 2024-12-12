<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;

    protected $fillable = ['faculty_name'];
    protected $table = 'faculty';


        public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function praktikangroups()
    {
        return $this->hasManyThrough(Praktikangroup::class, Course::class);
    }


}
