<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeeklyScore extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'course_id','p1', 'p2', 'p3', 'p4', 'p5','p6'];
}
