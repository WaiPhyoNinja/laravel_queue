<?php

namespace App\Http\Controllers;

use App\Models\TimeStand;
use Illuminate\Http\Request;

class TimeStandController extends Controller
{
    public function createTime()
    {
          TimeStand::create();
          return redirect('/')->with('success');
    }

    public function timeLists()
    {
        $times = TimeStand::get();
        return view('timelist', compact('times'));
    }
}
