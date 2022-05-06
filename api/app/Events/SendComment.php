<?php

namespace App\Events;

use App\Models\Game;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SendComment implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var int
     */
    private $game_id;
    /**
     * @var string
     */
    private $content;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(int $game_id, string $content)
    {
        $this->game_id = $game_id;
        $this->content = $content;
    }

    /**
     * @return Channel
     */
    public function broadcastOn()
    {
        //return new Channel('App.Game.' . $this->game_id);
        return new Channel('comment');
    }

    /**
     * @return mixed
     */
    public function broadcastAs()
    {
        //return new Channel('App.Game.' . $this->game_id);
        return 'SendComment';
    }

    public function broadcastWith()
    {
        return [
            'content' => $this->content,
        ];
    }
}
