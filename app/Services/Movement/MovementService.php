<?php

namespace App\Services\Movement;

use App\Models\Movement;
use App\Repositories\MovementRepository;
use Illuminate\Support\Collection;

class MovementService
{
    private MovementRepository $repository;

    public function __construct(MovementRepository $repository)
    {
        $this->repository = $repository;
    }

    public function find(int $id): Movement
    {
        return $this->repository->findById($id);
    }

    /**
     * @param integer $id
     * @return Collection<int, object>
     */
    public function showRank(int $id): Collection
    {
        $data = $this->repository->showRank($id);
        return $data;
    }
}
