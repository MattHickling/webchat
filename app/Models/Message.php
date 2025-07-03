<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'id',
        'user_id',
        'contact_id',
        'content',
        'content_type',
        'status',
        'type',
        'sent_at',
        'delivered_at',
        'read_at',
        'media_url',
        'media_type',
        'reply_to_message_id',
        'is_starred',
        'is_deleted',
        'created_at',
        'updated_at', 
    ];
}
