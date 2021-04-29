<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shops extends Model
{ 
    
    protected $primaryKey = 'shop_id';
    protected $table = 'shop';
  
    protected $fillable = [
        'shop_id',
        'company_id',
        'shop_name'

         ];       

 //Shop<>Comany relationship
 public function Shopcompany()  
 {
     return $this->belongsTo(BookmarkersCompany::class,'company_id');
 }
}
