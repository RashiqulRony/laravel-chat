<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMessage extends Model
{
    use HasFactory;

    protected $table = 'user_messages';

    protected $fillable = ['chat_session_id', 'user_id', 'message', 'type'];

    public function files() {
        return $this->hasMany(ChatFile::class, 'user_message_id', 'id');
    }
}
