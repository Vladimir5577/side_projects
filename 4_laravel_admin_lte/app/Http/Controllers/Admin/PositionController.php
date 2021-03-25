<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Position;
use App\Services\PositionService;
use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\PositionRequest;

class PositionController extends Controller
{
    /**
     * Display a listing of the positions.
     *
     * @param PositionService $positionService
     *
     * @return View|JsonResponse
     */
    public function index(PositionService $positionService)
    {
        if (request()->ajax()) {
            return $positionService->getDataTable();
        }

        return view('pages.positions.index');
    }

    /**
     * Show the form for creating a new position.
     *
     * @return View
     */
    public function create() : View
    {
        return view('pages.positions.create');
    }

    /**
     * Store a newly created position in storage.
     *
     * @param PositionRequest $request
     *
     * @return RedirectResponse
     */
    public function store(PositionRequest $request) : RedirectResponse
    {
        (new Position($request->validated()))->save();

        return redirect()->route('positions.index')->with('status', trans('responses.success.store'));
    }

    /**
     * Show the form for editing the specified position.
     *
     * @param Position $position
     *
     * @return View
     */
    public function edit(Position $position) : View
    {
        return view('pages.positions.edit', ['model' => $position]);
    }

    /**
     * Update the specified position in storage.
     *
     * @param PositionRequest $request
     * @param Position        $position
     *
     * @return RedirectResponse
     */
    public function update(PositionRequest $request, Position $position) : RedirectResponse
    {
        $position->fill($request->validated())->save();

        return redirect()->route('positions.index')->with('status', trans('responses.success.update'));
    }

    /**
     * Remove the specified position from storage.
     *
     * @param Position $position
     *
     * @throws Exception
     *
     * @return RedirectResponse
     */
    public function destroy(Position $position) : RedirectResponse
    {
        $position->delete();

        return redirect()->route('positions.index')->with('status', trans('responses.success.destroy'));
    }
}
