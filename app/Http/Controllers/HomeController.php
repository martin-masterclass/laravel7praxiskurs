<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Hobby;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        /*
        $hobbies = DB::table('hobbies')
            ->select()
            ->where('user_id', auth()->id())
            ->orderBy('updated_at', 'DESC')
            ->get();
        */

        $meldg_success = Session::get('meldg_success');

        $hobbies = Hobby::select()
            ->where('user_id', auth()->id())
            ->orderBy('updated_at', 'DESC')
            ->get();

        //dd($hobbies);

        return view('home')->with(
            [
                'hobbies' => $hobbies,
                'meldg_success' => $meldg_success
            ]
        );
    }
}
