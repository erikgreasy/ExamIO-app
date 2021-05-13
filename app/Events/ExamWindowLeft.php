<?php

namespace App\Events;

use App\Models\Exam;
use App\Models\Attendance;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;

class ExamWindowLeft implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $exam;
    public $attendance;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Exam $exam, Attendance $attendance)
    {
        $this->exam = $exam;
        $this->attendance = $attendance;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('exams.' . $this->exam->id);
    }


    public function broadcastAs()
  {
      return 'exam-window-left';
  }
}
