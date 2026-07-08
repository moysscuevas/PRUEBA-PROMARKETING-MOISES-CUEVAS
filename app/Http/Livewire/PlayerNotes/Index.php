<?php

namespace App\Http\Livewire\PlayerNotes;

use Livewire\Component;
use App\Models\Player;
use App\Services\PlayerNoteService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public Player $player;

    public string $note = '';

    public Collection $notes;

    private PlayerNoteService $service;

    protected $rules = [
        'note' => 'required|string|max:500',
    ];

    public function boot(PlayerNoteService $service): void
    {
        $this->service = $service;
    }

    public function mount(Player $player): void
    {
        $this->player = $player;

        $this->loadNotes();
    }

    public function loadNotes(): void
    {
        $this->notes = $this->service->getNotes($this->player->id);
    }

    public function save(): void
    {
        $this->validate();

        $this->service->create([
            'player_id' => $this->player->id,
            'user_id' => Auth::id(),
            'note' => $this->note,
        ]);

        $this->reset('note');

        $this->loadNotes();
    }

    public function render()
    {
        return view('livewire.player-notes.index');
    }

}
