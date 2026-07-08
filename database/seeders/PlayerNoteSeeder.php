<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Player;
use App\Models\User;
use App\Models\PlayerNote;

class PlayerNoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->count(5)->create();

        $users = User::all();

        Player::all()->each(function ($player) use ($users) {
            PlayerNote::factory()
                ->count(rand(2,5))
                ->create([
                    'player_id' => $player->id,
                    'user_id' => $users->random()->id,
                ]);
        });
    }
}
