<?php

namespace Tests\Unit\Events;

use App\Events\MessageSent;
use App\Message;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MessageSentTest extends TestCase
{
    use RefreshDatabase;

    public function testMessageSentEvent()
    {
        $user = factory(User::class)->create();
        $message = factory(Message::class)->create(['user_id' => $user->id]);

        $event = new MessageSent($user, $message);

        $this->assertInstanceOf(User::class, $event->user);
        $this->assertInstanceOf(Message::class, $event->message);
        $this->assertEquals($user->id, $event->user->id);
        $this->assertEquals($message->id, $event->message->id);
    }

    public function testMessageSentBroadcastOn()
    {
        $user = factory(User::class)->create();
        $message = factory(Message::class)->create(['user_id' => $user->id]);

        $event = new MessageSent($user, $message);

        $channels = $event->broadcastOn();

        $this->assertIsArray($channels);
        $this->assertCount(1, $channels);
        $this->assertInstanceOf(\Illuminate\Broadcasting\PrivateChannel::class, $channels[0]);
        $this->assertEquals('chat', $channels[0]->name);
    }
}
