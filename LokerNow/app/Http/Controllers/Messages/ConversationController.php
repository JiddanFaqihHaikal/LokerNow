<?php

namespace App\Http\Controllers\Messages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Conversation;
use App\Models\Message;
use App\Models\User;
use App\Models\Job;

class ConversationController extends Controller
{
    /**
     * Display a listing of the conversations.
     */
    public function index()
    {
        $user = Auth::user();
        $conversations = $user->conversations()
            ->with(['latestMessage', 'participants'])
            ->get()
            ->map(function ($conversation) use ($user) {
                $conversation->unread_count = $conversation->unreadMessagesCount($user->id);
                return $conversation;
            });

        return view('messages.index', compact('conversations'));
    }

    /**
     * Show the form for creating a new conversation.
     */
    public function create(Request $request)
    {
        $jobId = $request->input('job_id');
        $recipientId = $request->input('recipient_id');
        
        $job = null;
        $recipient = null;
        
        if ($jobId) {
            $job = Job::findOrFail($jobId);
        }
        
        if ($recipientId) {
            $recipient = User::findOrFail($recipientId);
        }
        
        return view('messages.create', compact('job', 'recipient'));
    }

    /**
     * Store a newly created conversation in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'recipient_id' => 'required|exists:users,id',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
            'job_id' => 'nullable|exists:jobs,id_job',
        ]);
        
        $user = Auth::user();
        $recipientId = $request->input('recipient_id');
        
        // Create a new conversation
        $conversation = Conversation::create([
            'subject' => $request->input('subject'),
            'job_id' => $request->input('job_id'),
        ]);
        
        // Add participants
        $conversation->participants()->attach([
            $user->id => ['last_read_at' => now()],
            $recipientId => ['last_read_at' => null],
        ]);
        
        // Create the first message
        $message = new Message([
            'sender_id' => $user->id,
            'body' => $request->input('message'),
        ]);
        
        $conversation->messages()->save($message);
        
        return redirect()->route('messages.show', $conversation->id)
            ->with('success', 'Message sent successfully.');
    }

    /**
     * Display the specified conversation.
     */
    public function show($id)
    {
        $user = Auth::user();
        $conversation = Conversation::with(['messages.sender', 'participants'])->findOrFail($id);
        
        // Check if user is a participant
        if (!$conversation->hasParticipant($user->id)) {
            abort(403, 'You are not authorized to view this conversation.');
        }
        
        // Mark conversation as read
        $conversation->participants()->updateExistingPivot($user->id, [
            'last_read_at' => now(),
        ]);
        
        return view('messages.show', compact('conversation'));
    }

    /**
     * Reply to a conversation.
     */
    public function reply(Request $request, $id)
    {
        $request->validate([
            'message' => 'required|string',
        ]);
        
        $user = Auth::user();
        $conversation = Conversation::findOrFail($id);
        
        // Check if user is a participant
        if (!$conversation->hasParticipant($user->id)) {
            abort(403, 'You are not authorized to reply to this conversation.');
        }
        
        // Create the reply message
        $message = new Message([
            'sender_id' => $user->id,
            'body' => $request->input('message'),
        ]);
        
        $conversation->messages()->save($message);
        
        // Update last_read_at for the sender
        $conversation->participants()->updateExistingPivot($user->id, [
            'last_read_at' => now(),
        ]);
        
        return redirect()->route('messages.show', $conversation->id)
            ->with('success', 'Reply sent successfully.');
    }
}
