<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\CustomerResetPasswordNotification;
use Illuminate\Database\Eloquent\Model;
class AuditLogins extends Model
{
    use Notifiable;
    protected $table = 'audit_login';
    protected $primaryKey = 'audit_login_id';
    

    protected $fillable = [
       'audit_login_id',
       'id',
       'user_types_id',
       'name',
        'email',
        'perspnal_file_no'
    ];
    public function userlogins()
    {
        return $this->belongsTo(User::class,'id','id');
    }
}


