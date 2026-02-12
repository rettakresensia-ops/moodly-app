<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mood extends Model
{
    // Tambahkan 'status' di sini
    protected $fillable = ['user_id', 'emoji', 'note', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
