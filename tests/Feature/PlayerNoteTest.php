<?php

namespace Tests\Feature;

use App\Models\Player;
use App\Models\PlayerNote;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PlayerNoteTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_note_is_saved()
    {
        $user = User::factory()->create();

        $player = Player::factory()->create();

        $this->actingAs($user);

        PlayerNote::create([
            'player_id' => $player->id,
            'user_id' => $user->id,
            'note' => 'Test note',
        ]);

        $this->assertDatabaseHas('player_notes', [
            'note' => 'Test note',
        ]);
    }

}
