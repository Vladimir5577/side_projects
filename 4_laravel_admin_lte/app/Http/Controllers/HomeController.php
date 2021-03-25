<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;

class HomeController extends Controller
{
    /**
     * Redirect for main section.
     *
     * @return RedirectResponse
     */
    public function __invoke() : RedirectResponse
    {
        return redirect()->route('employees.index');
    }
}
