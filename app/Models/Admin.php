<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;
        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey = 'admin_id';
    protected $fillable = [
        'name',
        'email',
        'password',
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
