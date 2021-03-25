<?php

namespace App\Http\Controllers\Api;

use App\Models\Position;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;

class PositionController extends Controller
{
    /**
     * Get positions array.
     *
     * @return Collection
     */
    public function __invoke() : Collection
    {
        return Position::findByName(request('q'))->get()->map(function ($item) {
            return [
                'id' => $item->id,
                'text' => $item->name,
            ];
        });
    }
}
