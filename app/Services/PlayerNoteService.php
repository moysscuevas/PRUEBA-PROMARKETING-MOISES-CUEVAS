<?php

namespace App\Services;

use App\Models\PlayerNote;
use Illuminate\Database\Eloquent\Collection;
use App\Repositories\PlayerNoteRepositoryInterface;

class PlayerNoteService
{
    public function __construct(
        private readonly PlayerNoteRepositoryInterface $repository
    ) {}

    public function getNotes(int $playerId): Collection
    {
        return $this->repository->getByPlayer($playerId);
    }

    public function create(array $data): PlayerNote
    {
        return $this->repository->create($data);
    }

}
