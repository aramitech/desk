<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adminusers extends Model
{
    protected $primaryKey = 'admin_id';
    protected $table = 'admins';
  
    protected $fillable = [
        'admin_id',
        'name',
        'email_verified_at',
        'password',
        'remember_token'
    ];   
}
