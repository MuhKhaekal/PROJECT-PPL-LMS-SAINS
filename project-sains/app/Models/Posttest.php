<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posttest extends Model
{
    use HasFactory;
    protected $fillable = ['kelancaran', 'hukum_bacaan', 'makharijul_huruf', 'user_id', 'course_id'];
}
