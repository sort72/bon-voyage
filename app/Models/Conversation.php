<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Conversation extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function client()
    {
        return $this->hasOne(User::class, 'id', 'client_id');
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function firstMessage()
    {
        return $this->hasOne(Message::class)->oldest();
    }

    public function lastMessage()
    {
        return $this->hasOne(Message::class)->latest();
    }
}
