<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presence extends Model
{
    use HasFactory;
    protected $fillable = ['status', 'keterangan', 'user_id', 'course_id', 'meeting_id'];
    protected $table = 'presence';    
    
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
