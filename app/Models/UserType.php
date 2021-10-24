<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{ 
    
    protected $primaryKey = 'user_types_id';
    protected $table = 'user_types';
  
    protected $fillable = [
        'user_types_id',
        'user_types'

         ];       
         public function usertypesusers()
         {
             return $this->hasMany(User::class,'user_types_id');
         }
}
