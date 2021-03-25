<?php

namespace App\Observers;

use App\Models\Employee;
use Illuminate\Support\Facades\DB;

class EmployeeObserver
{
    /**
     * @param Employee $employee
     */
    public function creating(Employee $employee) : void
    {
        $employee->admin_created_id = auth()->id();
    }

    /**
     * @param Employee $employee
     */
    public function updating(Employee $employee) : void
    {
        $employee->admin_updated_id = auth()->id();
    }

    /**
     * @param Employee $employee
     */
    public function deleting(Employee $employee) : void
    {
        DB::transaction(function () use ($employee) {
            if ($head = $employee->head) {
                foreach ($employee->child as $childItem) {
                    $childItem->head()->associate($head)->save();
                }
            }
        });
    }
}
