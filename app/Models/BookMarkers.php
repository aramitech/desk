<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookMarkers extends Model
{
    protected $primaryKey = 'bookmarker_id';
    protected $table = 'bookmarkers';
  
    protected $fillable = [
        'bookmarker_id',
        'company_id',
        'licensee_name',
        'license_no',
        'return_for_the_period_of',
        'return_for_the_period_to',
        'branch',
        'date',
        'bets_no',  
        'deposits',
        'total_sales',
        'total_payout',
        'wht',
        'winloss',
        'ggr'
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
 public function bookmarkerscompany()
 {
     return $this->belongsTo(BookmarkersCompany::class,'company_id');
 }
}
