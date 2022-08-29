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
        $grage1 = Lecture::where('published', true)->orderBy('id', 'desc')->where(['grade_id' => 1])->first();
        $grage2 = Lecture::where('published', true)->orderBy('id', 'desc')->where(['grade_id' => 2])->first();
        $grade3 = Lecture::where('published', true)->orderBy('id', 'desc')->where(['grade_id' => 3])->get();
        $lectures = [];
        if ($grage1):
            $lectures[] = $grage1;
        endif;
        if ($grage2):
            $lectures[] = $grage2;
        endif;
        for ($i = 0; $i < 2;$i++):
            if (isset($grade3[$i])):
                $lectures[] = $grade3[$i];
            endif;
        endfor;
        return view('index',compact('lectures'));
    }

    public function admin(){
        return view('Admin.dashboard');
    }
}
