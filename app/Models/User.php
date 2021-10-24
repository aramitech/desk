<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'departments_id',
        'name',
        'email',
        'password',
        'audit_log_id',
        'editstatus',
        'deletestatus',
        'bookmarkersstatus',
        'publiclotterystatus',
        'publicgamingstatus',
        'sendsms_status',
        'bookmarkersshop_status',
        'companies_status',
        'account_status',
        'user_accounts_status',
        'records_bookmarkers',
        'records_public_lotery',
        'records_public_gaming',
        'records_send_sms',
        'records_company',
        'records_accounts',
        'lottery_name',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function userlogs()
    {
        return $this->hasMany(AuditLog::class,'id');
    }
    public function departmentsusers()
    {
        return $this->belongsTo(Departments::class,'departments_id');
    }

    public function usertypesusers()
    {
        return $this->belongsTo(UserType::class,'user_types_id');
    }

    //inject to session
    ///add atgtributes to Auth
    public function getTwofaAttribute() 
    {
        // Check if twofa exists in session
        if(session()->has('twofa')) {
            // If so return twofa
            return session('twofa');
        }
    
        // If session did not have the twofa
        $twofa = 0;
    
        // Save it to session
        session(['twofa' => $twofa]);
    
        // Return first name
        return $twofa;
    }
    public function getOtpCodeAttribute() 
    {
        // Check if otpCode exists in session
        if(session()->has('otpCode')) {
            // If so return otpCode
            return session('otpCode');
        }
    
        // If session did not have the otpCode
        $otpCode = null;
    
        // Save it to session
        session(['otpCode' => $otpCode]);
    
        // Return first name
        return $otpCode;
    }
}
