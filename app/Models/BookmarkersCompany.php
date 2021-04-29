<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookmarkersCompany extends Model
{
    protected $primaryKey = 'company_id';
    protected $table = 'bookmarkerscompany';
  
    protected $fillable = [
        'company_id',
        'category_type_id',
        'company_name',
        'trading_name',
        'license_no',
        'email',
        'contact',
        'physicaladdress',
        'branch'
    ];       

 //Company<>CategoryType relationship
 public function CompanyCategoryType()
 {
     return $this->belongsTo(CategoryTypes::class,'category_type_id','categorytypes_id');
 }
 //Contacts<>Group relationship
 public function CategoryTypeCompany()
 {
        return $this->belongsTo(BookmarkersCompany::class,'company_id');
 }
 public function bookmarkerscompany()
 {
     return $this->hasMany(BookMarkers::class,'company_id');
 }
 public function publicLotterycompany()
 {
     return $this->hasMany(PublicLottery::class,'company_id');
 }
 public function publicGamingcompany()
 {
     return $this->hasMany(Publicgamings::class,'company_id');
 }
  //Shop<>Comany relationship
  public function Shopcompany()  
  {
      return $this->belongsTo(Shops::class,'company_id');
  }
}
