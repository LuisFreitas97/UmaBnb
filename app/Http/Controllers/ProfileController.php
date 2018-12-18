<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\User;
use App\UserType;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        return view('profile',[ "user" => $user ]);
    }

    public function store()
    {
        //

        Session::flash('store');
        return back();
    }

    public function destroy($id)
    {
        //
        
        Session::flash('destroy');
        return back();             
    }
}
