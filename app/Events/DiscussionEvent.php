<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class DiscussionEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $id;
    public $name;
    public $date;
    public $message;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($id, $name, $date, $message) {
        $this->id = $id;
        $this->name = $name;
        $this->date = $date;
        $this->message = $message;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn() {
        return ['syncd-notes'];
    }

    public function broadcastAs() {
        return 'discussion';
    }
}
