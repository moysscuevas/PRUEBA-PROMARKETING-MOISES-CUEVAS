<?php

namespace App\Repositories;

use App\Models\PlayerNote;
use Illuminate\Database\Eloquent\Collection;

interface PlayerNoteRepositoryInterface
{
    /**
     * Obtener todas las notas de un jugador.
     */
    public function getByPlayer(int $playerId): Collection;

    /**
     * Crear una nueva nota.
     */
    public function create(array $data): PlayerNote;
}
