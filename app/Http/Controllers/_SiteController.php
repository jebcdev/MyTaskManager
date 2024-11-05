<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Status;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class _SiteController extends Controller
{

    private $userId;

    public function __construct()
    {
        $this->userId = Auth::id();
    }
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

            /* Conteo de Tareas por Categoría */

            $categoriesAnalytics = [];

            foreach (Category::all() as $category) {
                $categoriesAnalytics[] = [
                    'category' => $category->name,
                    'color' => $category->color,
                    'total' => Task::where('category_id', $category->id)->count()
                ];
            }

            /* Conteo de Tareas por Categoría */

            /* Conteo de Tareas por Estado */

            $statusesAnalytics = [];

            foreach (Status::all() as $status) {
                $statusesAnalytics[] = [
                    'status' => $status->name,
                    'color' => $status->color,
                    'total' => Task::where('status_id', $status->id)->count()
                ];
            }

            /* Conteo de Tareas por Estado */

            // return $statusesAnalytics;



            return view('modules.admin.index', [
                // 'categories' => Category::all(),
                'categoriesAnalytics' => $categoriesAnalytics,
                'statusesAnalytics' => $statusesAnalytics
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
