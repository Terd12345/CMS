<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArchivedUser extends Model
{
    use HasFactory;

    protected $table = 'archive_users';

    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'role',
        'created_at',
        'updated_at',
    ];
}
