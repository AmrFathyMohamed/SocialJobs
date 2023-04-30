<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;
    protected $fillable = [
        'FullName',
        'ProfilePhoto',
        'PhoneNumber',
        'Email',
        'Password',
        'IsAdmin',
        'Link'
    ];
    public function UserBusiness()
    {
        return $this->hasMany(Business::class,'UserId');
    }
    public function UserSocial()
    {
        return $this->hasMany(Social::class,'UserId');
    }
}
