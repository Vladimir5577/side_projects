<?php

namespace App\Http\Controllers\Api;

use App\Models\Employee;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;

class EmployeeController extends Controller
{
    /**
     * Get employees array.
     *
     * @return Collection
     */
    public function __invoke() : Collection
    {
        return Employee::findByName(request('q'))->get()->map(function ($item) {
            return [
                'id' => $item->id,
                'text' => $item->name,
            ];
        });
    }
}
