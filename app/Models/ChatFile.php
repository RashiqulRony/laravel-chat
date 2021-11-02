<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatFile extends Model
{
    use HasFactory;

    protected $table = 'chat_files';

    protected $fillable = ['room_chat_id', 'user_message_id', 'name', 'size', 'ext', 'url'];
}
