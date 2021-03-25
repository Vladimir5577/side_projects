<?php

namespace App\Services;

use DataTables;
use App\Models\Position;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\PositionResource;

class PositionService
{
    /**
     * Get data for position.
     *
     * @return JsonResponse
     */
    public function getDataTable() : JsonResponse
    {
        return DataTables::eloquent(Position::query())
            ->setTransformer(function ($row) {
                $columns = PositionResource::make($row)->resolve();
                $columns['action'] = view('data_tables.actions.positions', compact('row'))->render();

                return $columns;
            })
            ->toJson();
    }
}
