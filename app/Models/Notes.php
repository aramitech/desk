<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notes extends Model
{
    protected $primaryKey = 'note_id';
    protected $table = 'notes';
  
    protected $fillable = [
        'note_id',
        'id',
        'note'
   
    ];       

 //Contacts<>Org relationship
 public function notesUser()
 {
     return $this->hasMany(User::class,'id');
 }

}
