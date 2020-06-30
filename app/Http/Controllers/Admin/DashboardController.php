<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Dashboard\IndexDashboard;
use App\Models\Dashboard;
use Brackets\AdminListing\Facades\AdminListing;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class DashboardController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexDashboard $request
     * @return array|Factory|View
     */
    public function index(IndexDashboard $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Dashboard::class)->get();

        if ($request->ajax()) {
            return ['data' => $data];
        }

        return view('admin.dashboard.index', ['data' => $data]);
    }

    /**
     * Display the specified resource.
     *
     * @param Dashboard $dashboard
     * @throws AuthorizationException
     * @return void
     */
    public function show(Dashboard $dashboard)
    {
        $this->authorize('admin.dashboard.show', $dashboard);

        // TODO your code goes here
    }
}
