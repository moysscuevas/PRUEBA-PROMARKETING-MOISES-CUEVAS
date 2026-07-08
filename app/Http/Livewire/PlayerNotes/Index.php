<?php

namespace App\Http\Livewire\PlayerNotes;

use Livewire\Component;
use App\Models\Player;
use App\Services\PlayerNoteService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\View\View;

class Index extends Component
{
    public Player $player;

    public string $note = '';

    public Collection $notes;

    protected $rules = [
        'note' => 'required|string|max:500',
    ];

    public function mount(Player $player): void
    {
        $this->player = $player;

        $this->loadNotes();
    }

    public function loadNotes(): void
    {
        $this->notes = app(PlayerNoteService::class)->getNotes($this->player->id);
    }

    public function save(): void
    {
        $this->validate();

        app(PlayerNoteService::class)->create([
            'player_id' => $this->player->id,
            'user_id' => auth()->id(),
            'note' => $this->note,
        ]);

        $this->reset('note');

        $this->loadNotes();
    }

    public function render(): View
    {
        return view('livewire.player-notes.index')->layout('layouts.app');
    }

}
