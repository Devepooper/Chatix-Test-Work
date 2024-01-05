<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ChatsControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testChatsIndexPageIsAccessible()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get('/chats');

        $response->assertStatus(200);
    }

    public function testFetchMessagesReturnsMessages()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get('/fetch-messages');

        $response->assertStatus(200);
        $response->assertJsonStructure([
            '*' => [
                'id',
                'user_id',
                'message',
                'created_at',
                'updated_at',
                'user' => [
                    'id',
                    'name',
                    'email',
                    'email_verified_at',
                    'created_at',
                    'updated_at',
                ],
            ],
        ]);
    }

    public function testSendMessageSuccessfully()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->post('/send-message', ['message' => 'Test message']);

        $response->assertStatus(200);
        $this->assertDatabaseHas('messages', ['message' => 'Test message']);
    }
}
