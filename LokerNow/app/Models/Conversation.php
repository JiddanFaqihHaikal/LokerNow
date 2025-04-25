<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'job_id',
        'subject',
    ];

    /**
     * Get the job associated with the conversation.
     */
    public function job()
    {
        return $this->belongsTo(Job::class, 'job_id', 'id_job');
    }

    /**
     * Get the participants of the conversation.
     */
    public function participants()
    {
        return $this->belongsToMany(User::class, 'conversation_participants')
            ->withPivot('last_read_at')
            ->withTimestamps();
    }

    /**
     * Get the messages in the conversation.
     */
    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    /**
     * Get the latest message in the conversation.
     */
    public function latestMessage()
    {
        return $this->hasOne(Message::class)->latest();
    }

    /**
     * Check if the user is a participant of the conversation.
     */
    public function hasParticipant($userId)
    {
        return $this->participants()->where('user_id', $userId)->exists();
    }

    /**
     * Get unread messages count for a user.
     */
    public function unreadMessagesCount($userId)
    {
        $lastRead = $this->participants()
            ->where('user_id', $userId)
            ->first()
            ->pivot
            ->last_read_at;

        if (!$lastRead) {
            return $this->messages()->count();
        }

        return $this->messages()
            ->where('created_at', '>', $lastRead)
            ->where('sender_id', '!=', $userId)
            ->count();
    }
}
