<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $primaryKey = 'company_id';
    protected $table = 'companies';
  
    protected $fillable = [
        'company_id',
        'company_name',
        'trading_name',
        'license_no',
        'email',
        'contact',
        'physicaladdress',
        'status'
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
