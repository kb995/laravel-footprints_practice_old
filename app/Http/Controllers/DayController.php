<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Day;

class DayController extends Controller
{
    public function create(Request $request) {
        $day = new Day();
        $day->date = $request->date;
        $day->user_id = Auth::id();
        Auth::user()->day()->save($day);

        return view('logs', ['day' => $day]);
    }
}
