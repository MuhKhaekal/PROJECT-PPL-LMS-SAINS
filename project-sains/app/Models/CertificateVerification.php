<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CertificateVerification extends Model
{
    use HasFactory;
    protected $fillable = ['certificate_verification_name', 'name', 'type', 'user_id'];
}
