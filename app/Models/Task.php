<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\CustomerResetPasswordNotification;
use Illuminate\Database\Eloquent\Model;
class Task extends Model
{
    use Notifiable;
    protected $table = 'task';
    protected $primaryKey = 'task_id';
    

    protected $fillable = [
       'task_id',
       'title',
       'description'
    ];
    public function usertask()
    {
        return $this->belongsTo(User::class,'id','id');
    }
}


