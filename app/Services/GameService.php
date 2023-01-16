<?php

namespace App\Services;

use App\Models\Game;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class GameService
{
    public $table = 'games';

    public function add(array $data = []): Game
    {
        $data['code'] = Str::code('GAME', $this->table, now()->format('Y-m-d'), 4);

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Game::create($data);
    }

    public function clone(array $data, Game $game): Game
    {
        $data['code'] = Str::code('GAME', $this->table, now()->format('Y-m-d'), 4);

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Game::create($data);
    }

    public function edit(Game $game, $data): Game
    {
        $game->update($data);
        $game->refresh();

        return $game;
    }

    public function active(Game $game): Game
    {
        $game->is_active = ! $game->is_active;
        $game->save();
        $game->refresh();

        return $game;
    }

    public function delete(Game $game): bool
    {
        return $game->delete();
    }

    public function deleteAll(array $games = []): bool
    {
        return Game::when($games, fn ($q) => $q->whereIn('id', $games))->delete();
    }

    public function restore(Game $game): bool
    {
        return $game->restore();
    }

    public function restoreAll(array $games = []): bool
    {
        return Game::when($games, fn ($q) => $q->whereIn('id', $games))->onlyTrashed()->restore();
    }

    public function deletePermanent(Game $game): bool
    {
        return $game->forceDelete();
    }

    public function deletePermanentAll(array $games = []): bool
    {
        return Game::when($games, fn ($q) => $q->whereIn('id', $games))->onlyTrashed()->forceDelete();
    }
}
