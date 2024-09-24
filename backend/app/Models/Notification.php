<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'message',
        'channel',
        'delivered'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public function channels()
    // {
    //     return $this->belongsToMany(Channel::class, 'notification_channel', 'notification_id', 'channel_id');
    // }
}
