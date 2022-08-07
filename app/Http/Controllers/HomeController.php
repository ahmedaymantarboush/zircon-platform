<?php

namespace App\Http\Controllers;

use App\Models\Lecture;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $grade3 = Lecture::where('published', true)->orderBy('id', 'desc')->where(['grade_id' => 3])->get();
        $lectures = [
            1 => Lecture::where('published', true)->orderBy('id', 'desc')->where(['grade_id' => 1])->first(),
            2 => Lecture::where('published', true)->orderBy('id', 'desc')->where(['grade_id' => 2])->first(),
            3 => $grade3[0],
            4 => count($grade3) > 1 ? $grade3[1] : null,
        ];
        return view('index',compact('lectures'));
    }
}
