<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaqShows extends Model
{
    use HasFactory;
    protected $table = 'faq_shows'; 
    protected $fillable = ['faq_id'];
}
