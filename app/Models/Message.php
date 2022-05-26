<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function conversation()
    {
        return $this->hasOne(Conversation::class);
    }

    public function admin()
    {
        return $this->hasOne(User::class, 'id', 'admin_id');
    }
}
