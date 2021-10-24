<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileRegistry extends Model
{ 
    
    protected $primaryKey = 'file_registry_id';
    protected $table = 'file_registry';
  
    protected $fillable = [
        'file_registry_id',
        'registry_id',
        'folio',
        'subject_heading',
        'registry_date',
        'status',
       
         ];       

  //FileRegistry<>Registry 
  public function FileRegistryRegistry()
  {
      return $this->belongsTo(Registry::class,'registry_id');
  }


    //FileRegistry<>Registry 
    public function assignregistry_registry()
    {
        return $this->hasMany(AssignRegistry::class,'registry_id');
    }
  


}
