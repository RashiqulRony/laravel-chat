<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{
    use HasFactory;

    protected $table = 'chat_messages';

    protected $fillable = ['chat_room_id', 'user_id', 'message', 'type'];

    public function room() {
        return $this->belongsTo(ChatRoom::class, 'chat_room_id', 'id');
    }

    public function files() {
        return $this->hasMany(ChatFile::class, 'chat_id', 'id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
