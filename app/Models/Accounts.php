<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accounts extends Model
{
    protected $primaryKey = 'accounts_id';
    protected $table = 'accounts';
  
    protected $fillable = [
        'accounts_id',
        'company_id',
        'mrno',
        'application_fee',
        'transfer_fee',
        'annual_license_fee',
        'investigation_fee_local',
        'investigation_fee_foreign',
        'premise_fee',  
        'renewal_fee',
        'operating_fee',
        'totals',
        'status'
    ];       

 //Contacts<>Org relationship
 public function accountscompany()
 {
     return $this->belongsTo(BookmarkersCompany::class,'company_id');
 }
}
