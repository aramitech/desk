<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\CustomerResetPasswordNotification;
use Illuminate\Database\Eloquent\Model;
class AuditLog extends Authenticatable
{
    use Notifiable;
    public $timestamps = false;
    protected $table = 'audit_log';
    protected $primaryKey = 'audit_log_id';
    

    protected $fillable = [
       'audit_log_id',
       'audit_module',
       'audit_activity',
       'user_category',
        'id'
    ];
    public function userlogs()
    {
        return $this->belongsTo(User::class,'id');
    }
}


