<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class AttendanceController extends Controller
{
    public function create(Request $request)
    {
        $today = now()->toDateString();
        $attendance = Attendance::where('user_id', $request->user()->id)
            ->where('work_date', $today)
            ->first();

        return view('attendance.create', compact('attendance', 'today'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'action' => ['required', 'in:check_in,check_out'],
        ]);

        $today = now()->toDateString();
        $attendance = Attendance::where('user_id', $request->user()->id)
            ->where('work_date', $today)
            ->first();

        if ($validated['action'] === 'check_in') {
            if ($attendance && $attendance->check_in_at) {
                return back()->withErrors(['attendance' => 'Anda sudah absen masuk hari ini.']);
            }

            if (! $attendance) {
                Attendance::create([
                    'user_id' => $request->user()->id,
                    'work_date' => $today,
                    'check_in_at' => now(),
                ]);
            } else {
                $attendance->update(['check_in_at' => now()]);
            }

            return back()->with('status', 'Absen masuk berhasil.');
        }

        if (! $attendance || ! $attendance->check_in_at) {
            return back()->withErrors(['attendance' => 'Silakan absen masuk terlebih dahulu.']);
        }

        if ($attendance->check_out_at) {
            return back()->withErrors(['attendance' => 'Anda sudah absen pulang hari ini.']);
        }

        $attendance->update(['check_out_at' => now()]);

        return back()->with('status', 'Absen pulang berhasil.');
    }

    public function index()
    {
        $attendances = Attendance::with('user')
            ->orderByDesc('work_date')
            ->orderByDesc('id')
            ->get();

        return view('admin.attendances.index', compact('attendances'));
    }

    public function exportPdf()
    {
        $attendances = Attendance::with('user')
            ->orderByDesc('work_date')
            ->orderByDesc('id')
            ->get();

        $pdf = Pdf::loadView('admin.attendances.pdf', compact('attendances'))
            ->setPaper('a4', 'landscape');

        return $pdf->download('data-absensi.pdf');
    }
}
