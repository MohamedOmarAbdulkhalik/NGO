<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class AdminController extends Controller {
    public function index() {
        return Inertia::render('Admin/Dashboard', [
            'stats' => [
                'total_visitors' => 1500,
                'total_content' => 45,
                'pending_approvals' => 3,
            ]
        ]);
    }
}
