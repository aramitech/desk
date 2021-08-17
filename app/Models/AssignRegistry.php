<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignRegistry extends Model
{ 
    
    protected $primaryKey = 'assign_registry_id';
    protected $table = 'assign_registry';
  
    protected $fillable = [
        'assign_registry_id',
        'file_registry_id',
        'registry_id',
        'date_issued',
        'issued_to',
        'duration_issued',
        'reason_you_issue',
       
         ];       

 

}
