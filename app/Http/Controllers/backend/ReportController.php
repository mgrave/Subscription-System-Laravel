<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Packagelist;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    //View Report Page
    public function index()
    {
        $reports    = Packagelist::with('user', 'package')->get();
        $totalPrice = null;

        foreach ($reports as $report) {
            $totalPrice = $report->package->sum('package_price');
        }

        return view('backend.report.index', compact('reports', 'totalPrice'));
    }

    //Notification Page
    public function notification()
    {
        $reports = Packagelist::with('user', 'package')->get();

        return view('backend.report.notification', compact('reports'));
    }

    public function sorting(Request $request)
    {
        if ($request->has('start_date')) {
            $reports = Packagelist::with('user', 'package')->where('start_date', $request->start_date)->get();

            return response()->json([
                'status' => 200,
                'data'   => $reports,
            ]);
        } elseif ($request->has('days')) {

            $day     = (int) $request->days;
            $reports = Packagelist::with('user', 'package')
                ->whereBetween('start_date', [now()->subDays($day), now()])
                ->get();

            return response()->json([
                'status' => 200,
                'data'   => $reports,
            ]);
        }

    }
}
