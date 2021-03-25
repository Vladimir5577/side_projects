<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Employee;
use App\Services\EmployeeService;
use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\EmployeeRequest;

class EmployeeController extends Controller
{
    /**
     * @var EmployeeService
     */
    private EmployeeService $employeeService;

    /**
     * EmployeeController constructor.
     *
     * @param EmployeeService $employeeService
     */
    public function __construct(EmployeeService $employeeService)
    {
        $this->employeeService = $employeeService;
    }

    /**
     * Display a listing of the employees.
     *
     * @return View|JsonResponse
     */
    public function index()
    {
        if (request()->ajax()) {
            return $this->employeeService->getDataTable();
        }

        return view('pages.employees.index');
    }

    /**
     * Show the form for creating a new employee.
     *
     * @return View
     */
    public function create() : View
    {
        return view('pages.employees.create');
    }

    /**
     * Store a newly created employee in storage.
     *
     * @param EmployeeRequest $request
     *
     * @return RedirectResponse
     */
    public function store(EmployeeRequest $request) : RedirectResponse
    {
        $this->employeeService->store($request);

        return redirect()->route('employees.index')->with('status', trans('responses.success.store'));
    }

    /**
     * Show the form for editing the specified employee.
     *
     * @param Employee $employee
     *
     * @return View
     */
    public function edit(Employee $employee) : View
    {
        return view('pages.employees.edit', ['model' => $employee]);
    }

    /**
     * Update the specified employee in storage.
     *
     * @param EmployeeRequest $request
     * @param Employee        $employee
     *
     * @return RedirectResponse
     */
    public function update(EmployeeRequest $request, Employee $employee) : RedirectResponse
    {
        $this->employeeService->update(...func_get_args());

        return redirect()->route('employees.index')->with('status', trans('responses.success.update'));
    }

    /**
     * Remove the specified employee from storage.
     *
     * @param Employee $employee
     *
     * @throws Exception
     *
     * @return RedirectResponse
     */
    public function destroy(Employee $employee) : RedirectResponse
    {
        $employee->delete();

        return redirect()->route('employees.index')->with('status', trans('responses.success.destroy'));
    }
}
