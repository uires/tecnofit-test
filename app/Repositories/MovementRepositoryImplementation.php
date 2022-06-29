<?php

namespace App\Repositories;

use App\Models\Movement;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class MovementRepositoryImplementation implements MovementRepository
{

    /**
     * Find the Movement model based on the id value
     *
     * @param integer $id
     * @throws ModelNotFoundException
     * @return Movement
     */
    public function findById(int $id): Movement
    {
        return Movement::findOrFail($id);
    }

    /**
     * Return an collection of ranks
     *
     * @param integer $id
     * @return Collection<int, object>
     */
    public function showRank(int $id): Collection
    {
        return DB::table("personal_record AS pc")
            ->join('user AS u', 'u.id', '=', 'pc.user_id')
            ->where("pc.movement_id", $id)
            ->select(
                "u.name AS name_user",
                "u.id AS user_id",
                "pc.value",
                "pc.date",
                DB::raw("(RANK() OVER (PARTITION BY pc.movement_id ORDER BY pc.value DESC)) AS general_rank_position"),
            )->get();
    }
}
