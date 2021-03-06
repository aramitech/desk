<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicLottery extends Model
{ 
    
    protected $primaryKey = 'publiclottery_id';
    protected $table = 'publiclottery';
  
    protected $fillable = [
        'publiclottery_id',
        'company_name',
        'license_no',
        'return_for_of',
        'return_to',
        'date',
        'total_tickets_sold',
        'sales',
        'payouts',
        'ggr',
        'wht'
         ];       

 //Contacts<>Org relationship
 public function contactOrg()
 {
     return $this->belongsTo(Organization::class,'organization_id');
 }
 //Contacts<>Group relationship
 public function contactGroup()
 {
     return $this->belongsTo(Group::class,'group_id');
 }
}
