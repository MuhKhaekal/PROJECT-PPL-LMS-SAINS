<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class study_program extends Model
{
    use HasFactory;
    protected $fillable = ['study_program_name'];
    protected $table = 'study_program';
}
