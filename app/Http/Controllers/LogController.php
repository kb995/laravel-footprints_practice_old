<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Log;
use App\Http\Requests\CreateLog;

class LogController extends Controller
{
    public function index() {
        $logs = Log::all();
        return view('logs', compact('logs'));
    }

    public function create(CreateLog $request) {
        $log = new Log();
        $log->log = $request->log;
        $log->save();
        return redirect()->route('logs');
    }

    public function edit(int $log) {
        $log = Log::find($log);
        return view('edit', compact('log'));
    }

        public function update(int $log, Request $request) {
        $log = Log::find($log);
        $log->log = $request->log;
        $log->save();
        return redirect()->route('logs');
    }

    public function destroy(int $log) {
        $log = Log::find($log);
        $log->delete();
        return redirect()->route('logs');
    }

}
