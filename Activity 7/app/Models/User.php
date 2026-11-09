<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Activity 7's account directory user, not a Laravel login/authentication account.
 * Its fields match the TFA2/TFA6 user account schema plus the TFA7 avatar.
 */
class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'username',
        'full_name',
        'avatar',
    ];
}
