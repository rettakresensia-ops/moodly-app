<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mood extends Model
{
    // Baris ini sangat penting agar data bisa masuk ke database
    protected $fillable = ['user_id', 'status', 'note'];
}
