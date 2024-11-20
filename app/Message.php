<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'messages';

    protected $fillable = [
        'recipient',
        'sender',
        'text',
    ];

    public function senderUser()
    {
        return $this->belongsTo(User::class, 'sender', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'recipient', 'id');
    }
}
