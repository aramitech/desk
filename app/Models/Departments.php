<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departments extends Model
{ 
    
    protected $primaryKey = 'departments_id';
    protected $table = 'departments';
  
    protected $fillable = [
        'departments_id',
        'department_name',
       
         ];       

         public function departmentsusers()
         {
             return $this->hasMany(User::class,'departments_id');
         }
} 
