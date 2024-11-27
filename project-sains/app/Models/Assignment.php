<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;
    protected $fillable = ['assignment_name', 'assignment_file_name', 'description','user_id', 'course_id', 'meeting_id'];
    protected $table = 'assignments';    
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function meeting()
    {
        return $this->belongsTo(Meeting::class);
    }
}
