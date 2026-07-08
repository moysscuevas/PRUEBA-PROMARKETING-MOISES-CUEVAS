<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\PlayerNoteRepository;
use App\Repositories\PlayerNoteRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            PlayerNoteRepositoryInterface::class,
            PlayerNoteRepository::class
        );
    }

    public function boot(): void
    {
        //
    }

}
