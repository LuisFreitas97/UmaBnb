<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;

use App\User;
use App\GenderRule;
use App\UserType;
use App\Extra;
use App\AdvertisementType;
use App\Typology;
use App\StuffingItem;
use App\Advertisement;

use Illuminate\Support\Facades\DB;

class PanelController extends Controller
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
        $userId = Auth::user()->id;

        $isAdmin = DB::table('users')
                    ->join('user_types', 'users.userType', '=', 'user_types.id')
                    ->where(
                        [
                            ['users.id','=',$userId],
                            ['user_types.description', '=', 'admin']
                        ])
                    ->exists();

        if(!$isAdmin) return redirect("/");

        $users = User::all();
        $userTypes = UserType::all();
        $grules = GenderRule::all();
        $extras = Extra::all();    
        $types = AdvertisementType::all();    
        $typos = Typology::all();
        $sitems = StuffingItem::all();    
        $ads = Advertisement::all();    

        return view('panel',[ "ads" => $ads, "users" => $users, "userTypes" => $userTypes, "grules" => $grules, "extras" => $extras, "types" => $types, "typos" => $typos, "sitems" => $sitems ]);
    }

    public function update(Request $request)
    {
        $users = User::all();

        foreach($users as $user)
        {
            $user->userType = $request["userType-user".$user->id];
            $user->save();
        }

        Session::flash('success','Utilizadores atualizados com sucesso!');
        return back();
    }

    public function destroy($id)
    {
        //   
    }
}
