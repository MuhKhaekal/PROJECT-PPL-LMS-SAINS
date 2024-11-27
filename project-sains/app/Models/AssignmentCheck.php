<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignmentCheck extends Model
{
    use HasFactory;
    protected $fillable = ['assignment_check_file_name', 'score' ,'user_id', 'assignment_id'];
    protected $table = 'assignment_checks';    
}
