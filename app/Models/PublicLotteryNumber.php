<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicLotteryNumber extends Model
{ 
    
    protected $primaryKey = 'publiclotterynumber_id';
    protected $table = 'publiclotterynumber';
  
    protected $fillable = [
        'publiclotterynumber_id',
        'company_id',
        'license_no',
        'lottery_name',
        'lottery_number',
        'status',
        'periodfrom',
        'periodto'
         ];       

 //Contacts<>Org relationship
 public function contactOrg()
 {
     return $this->belongsTo(Organization::class,'organization_id');
 }

 public function publicLotterycompany()  
 {
     return $this->belongsTo(BookmarkersCompany::class,'company_id');
 }

 //Shop<>Comany relationship
 public function Lotteryshopnumber()  
 {
     return $this->belongsTo(PublicLottery::class,'company_id','company_id');
 }


}
