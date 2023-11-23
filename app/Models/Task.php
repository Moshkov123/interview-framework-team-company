<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['task', 'users_id'];

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
