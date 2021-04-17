<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActiveStatusType extends Model
{
    protected $primaryKey = 'activestatustypes_id';
    protected $table = 'activestatustypes';
  
    protected $fillable = [
        'activestatustypes_id',
        'statustypes'
    
    ];  

     //statustypes Type<>Company relationship
 public function StatusCategoryType()
 {
     return $this->belongsTo(BookmarkersCompany::class,'company_id');
 }


}
