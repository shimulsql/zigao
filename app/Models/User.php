<?php

namespace App\Models;

use Illuminate\Support\Str;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Crypt;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'avatar',
        'provider',
        'provider_id',
        'password',
        'token',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Relationships
     */

    public function draft(){
        return $this->hasOne(DraftQuestion::class);
    }


    /**
     * Casts
     */
    protected function password(): Attribute
    {
        return Attribute::set(fn ($value) => Hash::make($value));
    }

    protected function token() : Attribute
    {
        return Attribute::set(function ($user_id){
            $str_user_enc = base64_encode(base64_encode($user_id));
            $str_random = Str::random(20);

            return $str_random . '.' . $str_user_enc;
        });
    }

}
