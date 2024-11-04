<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class _SiteController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        try {
            return view('modules.home.index');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function dashboard()
    {
        try {
            return view('modules.dashboard.index');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function admin()
    {
        try {
            return view('modules.admin.index');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
