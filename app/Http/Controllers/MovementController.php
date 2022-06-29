<?php

namespace App\Http\Controllers;

use App\Services\Movement\MovementService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class MovementController extends Controller
{
    private MovementService $service;

    public function __construct(MovementService $service)
    {
        $this->service = $service;
    }

    public function show(int $id): JsonResponse
    {
        $data = $this->service->find($id);
        return response()->json($data, Response::HTTP_OK);
    }

    public function showRank(int $id): JsonResponse
    {
        $movement = $this->service->find($id);
        $movementRank = $this->service->showRank($id);

        return response()->json([
            "movement" => [
                "id" => $movement->id,
                "name" => $movement->name,
                "rank" => $movementRank
            ]
        ], Response::HTTP_OK);
    }
}
