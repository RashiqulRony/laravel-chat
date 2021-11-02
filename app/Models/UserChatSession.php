<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserChatSession extends Model
{
    use HasFactory;

    protected $table = 'user_chat_sessions';

    protected $fillable = ['conversation_id', 'conversation_secret'];

    public function messages () {
        return $this->hasMany(UserMessage::class, 'chat_session_id', 'id');
    }

}
