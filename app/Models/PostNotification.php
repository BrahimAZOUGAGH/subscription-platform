<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostNotification extends Model
{
    use HasFactory;

    protected $fillable = ['post_id', 'user_id'];
}
