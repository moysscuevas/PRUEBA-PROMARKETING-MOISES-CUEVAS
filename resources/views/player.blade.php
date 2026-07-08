<!DOCTYPE html>
<html>
    <head>
        <title>Notas Jugadores</title>
        @livewireStyles
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="container mt-5">
            <h2>{{ $player->full_name }}</h2>
            <hr>
            <livewire:player-notes.index :player="$player" />
        </div>
        @livewireScripts
    </body>
</html>
