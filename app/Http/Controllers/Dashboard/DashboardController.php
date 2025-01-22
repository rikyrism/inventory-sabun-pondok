<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Services\Dashboard\DashboardService;

class DashboardController extends Controller
{
    public function __construct(
        protected DashboardService $service
    ) {}

    public function index(): View
    {
        $count = $this->service->getCountData();
        $barangs = $this->service->getDataBarang();
        return view('dashboard.index', [
            'count' => $count,
            'barangs' => $barangs,
        ]);
    }
}
