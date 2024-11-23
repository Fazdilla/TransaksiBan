<?php

namespace App\Http\Controllers;

use App\Models\Ban;
use App\Models\LepasBan;
use App\Models\OtfBan;
use App\Models\PemakaianBan;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display the dashboard with summary statistics
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        // Get summary statistics
        $stats = [
            'total_ban' => Ban::count(),
            'ban_terpakai' => PemakaianBan::count(),
            'ban_lepas' => LepasBan::count(),
            'otf_ban' => OtfBan::count(),
        ];

        // Get recent activities (last 5)
        $recent_activities = collect();

        // Recent tire installations
        $pemakaian_recent = PemakaianBan::with(['ban', 'kendaraan'])
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get()
            ->map(function ($item) {
                return [
                    'type' => 'pemakaian',
                    'message' => "Ban " . ($item->ban->no_seri ?? 'Unknown') . " dipasang pada kendaraan " . ($item->kendaraan->nopol ?? 'Unknown'),
                    'date' => $item->created_at
                ];
            });
        $recent_activities = $recent_activities->concat($pemakaian_recent);

        // Recent tire removals
        $lepas_recent = LepasBan::with(['ban', 'kendaraan'])
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get()
            ->map(function ($item) {
                return [
                    'type' => 'lepas',
                    'message' => "Ban " . ($item->ban->no_seri ?? 'Unknown') . " dilepas dari kendaraan " . ($item->kendaraan->nopol ?? 'Unknown'),
                    'date' => $item->created_at
                ];
            });
        $recent_activities = $recent_activities->concat($lepas_recent);

        // Recent OTF activities
        $otf_recent = OtfBan::with(['ban', 'kendaraan'])
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get()
            ->map(function ($item) {
                return [
                    'type' => 'otf',
                    'message' => "OTF Ban " . ($item->ban->no_seri ?? 'Unknown') . " pada kendaraan " . ($item->kendaraan->nopol ?? 'Unknown'),
                    'date' => $item->created_at
                ];
            });
        $recent_activities = $recent_activities->concat($otf_recent);

        // Sort all activities by date
        $recent_activities = $recent_activities
            ->sortByDesc('date')
            ->take(5)
            ->values();

        // Get tire initial status distribution
        $status_distribution = Ban::select('status_awal', DB::raw('count(*) as total'))
            ->groupBy('status_awal')
            ->get()
            ->map(function ($item) {
                return [
                    'status' => $item->status_awal ?: 'Tidak ada status',
                    'total' => $item->total
                ];
            });

        return view('dashboard.index', compact('stats', 'recent_activities', 'status_distribution'));
    }

    /**
     * Show the upload form
     *
     * @return \Illuminate\View\View
     */
    public function upload()
    {
        return view('dashboard.upload');
    }
}
