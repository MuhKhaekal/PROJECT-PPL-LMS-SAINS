<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PraktikanGroup extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'course_id'];
    protected $table = 'praktikangroup';
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi dengan Course
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
