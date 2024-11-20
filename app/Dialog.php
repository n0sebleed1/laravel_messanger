<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dialog extends Model
{
    protected $table = 'dialogs';

    protected $fillable = [
        'recipient',
        'sender',
        'new_messages'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'recipient', 'id');
        return $this->belongsTo(User::class, 'sender', 'id');
    }
}
