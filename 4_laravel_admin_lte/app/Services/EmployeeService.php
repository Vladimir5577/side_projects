<?php

namespace App\Services;

use DataTables;
use App\Models\Employee;
use App\Models\Position;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\EmployeeRequest;
use App\Http\Resources\EmployeeResource;

class EmployeeService
{
    /**
     * Get data for employee.
     *
     * @return JsonResponse
     */
    public function getDataTable() : JsonResponse
    {
        return DataTables::eloquent(Employee::query())
            ->setTransformer(function ($row) {
                $columns = EmployeeResource::make($row)->resolve();
                $columns['action'] = view('data_tables.actions.employees', compact('row'))->render();
                $columns['photo'] = view('data_tables.columns.photo', compact('row'))->render();

                return $columns;
            })
            ->filterColumn('position', function ($query, $keyword) {
                return $query->whereHas('position', function ($q) use ($keyword) {
                    return $q->where('name', 'LIKE', "%$keyword%");
                });
            })
            ->toJson();
    }

    /**
     * Store a newly created employee in storage.
     *
     * @param EmployeeRequest $request
     *
     * @return bool
     */
    public function store(EmployeeRequest $request) : bool
    {
        $employee = new Employee($request->validated());
        $employee->position()->associate(Position::find($request->get('position_id')));

        if ($head_id = $request->get('head_id')) {
            $employee->head()->associate(Employee::find($head_id));
        }

        if ($request->hasFile('photo')) {
            $employee->photo = $request->file('photo');
        }

        return $employee->save();
    }

    /**
     * Update the specified employee in storage.
     *
     * @param EmployeeRequest $request
     * @param Employee        $employee
     *
     * @return bool
     */
    public function update(EmployeeRequest $request, Employee $employee) : bool
    {
        $employee->fill($request->validated());
        $employee->position()->associate(Position::find($request->get('position_id')));

        if ($head_id = $request->get('head_id')) {
            $employee->head()->associate(Employee::find($head_id));
        }

        if ($request->hasFile('photo')) {
            $employee->photo = $request->file('photo');
        }

        return $employee->save();
    }
}
