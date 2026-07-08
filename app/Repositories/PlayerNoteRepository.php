<?php

namespace App\Repositories;

use App\Models\PlayerNote;
use Illuminate\Database\Eloquent\Collection;

class PlayerNoteRepository implements PlayerNoteRepositoryInterface
{
    public function getByPlayer(int $playerId): Collection
    {
        return PlayerNote::query()
            ->with('author')
            ->where('player_id', $playerId)
            ->latest()
            ->get();
    }

    public function create(array $data): PlayerNote
    {
        return \DB::transaction(function () use ($data) {
            return PlayerNote::create($data);
        });
    }

}
