<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class AdminUser extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'admin_users';

    protected $fillable = ['name', 'email', 'password', 'profile_picture'];

    protected $hidden = ['password'];

    protected $casts = [
        'password' => 'hashed',
    ];
}
