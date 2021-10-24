<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    protected $primaryKey = 'event_id';
    protected $table = 'events';
  
    protected $fillable = [
        'event_id',
        'event_title',
        'start_date',
        'end_date',
        'description'
   
    ];       

 //Contacts<>Org relationship
 public function eventsUser()
 {
     return $this->hasMany(User::class,'event_id');
 }

}
