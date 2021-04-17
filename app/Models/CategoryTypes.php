<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryTypes extends Model
{
    protected $primaryKey = 'categorytypes_id';
    protected $table = 'categorytypes';
  
    protected $fillable = [
        'categorytypes_id',
        'categorytype'
    
    ];  

     //Category Type<>Company relationship
 public function CompanyCategoryType()
 {
     return $this->hasMany(BookmarkersCompany::class,'category_type_id');
 }

  //Contacts<>Group relationship
  public function contactGroup()
  {
      return $this->belongsTo(Group::class,'group_id');
  }
}
