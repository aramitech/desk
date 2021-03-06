<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publicgamings extends Model
{
    protected $primaryKey = 'publicgaming_id';
    protected $table = 'publicgamings';
  
    protected $fillable = [
        'publicgaming_id',
        'licensee_name',
        'license_no',
        'return_for_the_period_of',
        'return_for_the_period_to',
        'date',
        'sales',
        'payouts',
        'wht',
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
}
