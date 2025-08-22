<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeeklyScore extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'course_id','meeting_id','score'];
}
