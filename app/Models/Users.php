<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'user'; // bảng trong DB
    public $timestamps = false;

    // Cho phép mass assignment khi create
    protected $fillable = [
        'user_username',
        'user_password',
        'user_fullname',
        'user_address',
        'user_role'
    ];
}
