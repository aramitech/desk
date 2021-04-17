<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SendSmses extends Model
{
    protected $primaryKey = 'sendsms_id';
    protected $table = 'sendsms';
  
    protected $fillable = [
        'sendsms_id',
        'message',
        'company_id'

    ];       

 
}
