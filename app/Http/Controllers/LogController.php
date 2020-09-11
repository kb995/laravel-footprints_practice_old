<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Day;
use App\Models\Log;
use App\User;
use App\Http\Requests\CreateLog;
use App\Http\Requests\EditLog;

class LogController extends Controller
{
    public function index() {
        return view('index');

    }

    public function logs(int $day) {
        $user = User::find(Auth::id());
        $day = $user->day()->where('id', $day)->first();
        $logs = $day->logs()->get();

        return view('logs', compact('day', 'logs'));
    }
    // public function getLogDays() {
    // }

    public function create(int $day, CreateLog $request) {
        $log = new Log();
        $log->log = $request->log;
        $log->date_id = $day;
        $log->save();

        return redirect()->route('logs', ['day' => $day]);
    }

    public function edit(int $day, int $log) {
        $day = Day::find($day);
        $log = Log::find($log);
        return view('edit', compact('day', 'log'));
    }

    public function update(int $day, int $log, EditLog $request) {
    $user = User::find(Auth::id());
    $day = $user->day()->where('id', $day)->first();
    $log = $day->logs()->where('id', $log)->first();

    $log->log = $request->log;
    $log->date_id = $day->id;
    $log->save();

    return redirect()->route('logs', ['day' => $day->id]);
}

    public function destroy(int $day, int $log) {
        $user = User::find(Auth::id());
        $day = $user->day()->where('id', $day)->first();
        $log = $day->logs()->where('id', $log)->first();
        $log->delete();

        return redirect()->route('logs', ['day' => $day->id]);
    }

}
