<?php

namespace Tests\Unit;

use App\Message;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MessageTest extends TestCase
{
    use RefreshDatabase;

    public function testMessageBelongsToUser()
    {
        $user = factory(User::class)->create();
        $message = factory(Message::class)->create(['user_id' => $user->id]);

        $this->assertInstanceOf(User::class, $message->user);
        $this->assertEquals($user->id, $message->user->id);
    }
}
