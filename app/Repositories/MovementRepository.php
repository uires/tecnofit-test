<?php

namespace App\Repositories;

use App\Models\Movement;
use Illuminate\Support\Collection;

interface MovementRepository
{
    /**
     * Return an model filled with data
     * @param int $id
     * @return Movement
     */
    public function findById(int $id): Movement;

    /**
     * @param integer $id
     * @return Collection<int, object>
     */
    public function showRank(int $id): Collection;
}
