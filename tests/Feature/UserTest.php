<?php

namespace Tests\Unit;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function testUserHasManyMessages()
    {
        $user = factory(User::class)->create();
        factory(Message::class, 3)->create(['user_id' => $user->id]);

        $this->assertInstanceOf(\Illuminate\Database\Eloquent\Collection::class, $user->messages);
        $this->assertCount(3, $user->messages);
        $this->assertInstanceOf(Message::class, $user->messages->first());
    }
}
