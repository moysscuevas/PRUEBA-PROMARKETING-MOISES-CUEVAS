<div>
    <div class="card">
        <div class="card-header">
            <h4>Notas del jugador</h4>
        </div>
        <div class="card-body">
            @can('create player notes')
                <form wire:submit.prevent="save">
                    <div class="mb-3">
                        <textarea wire:model.defer="note" class="form-control" rows="4" placeholder="Escribe una nota aquí..."></textarea>
                        @error('note')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">
                        Agregar Nota
                    </button>
                </form>
                <hr>
            @endcan
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Autor</th>
                        <th>Nota</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($notes as $note)
                        <tr>
                            <td>
                                {{ $note->created_at->format('d/m/Y H:i') }}
                            </td>
                            <td>
                                {{ $note->author->name }}
                            </td>
                            <td>
                                {{ $note->note }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center">
                                No hay notas disponibles aún.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
