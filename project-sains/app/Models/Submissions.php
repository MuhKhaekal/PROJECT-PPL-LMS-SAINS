<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class submissions extends Model
{
    use HasFactory;
    protected $fillable = ['submissions_file_name', 'score' ,'user_id', 'assignment_id'];
    protected $table = 'submissions';    
}
