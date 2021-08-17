<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registry extends Model
{ 
    
    protected $primaryKey = 'registry_id';
    protected $table = 'registry';
  
    protected $fillable = [
        'registry_id',
        'class',
        'subject',
        'number',
        'file_name', 
       
         ];       

   //FileRegistry<>Registry 
   public function FileRegistryRegistry()
   {
       return $this->hasMany(FileRegistry::class,'registry_id');
   }
 

}
