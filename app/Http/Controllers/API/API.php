<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Kuliner;
use App\Models\User;
use App\Models\Wahana;
use Illuminate\Http\Request;

class API extends Controller
{
    //
    public function wahana()
    {
        $wahana  = new Wahana();
        $wahana  = $wahana->get();
        return response()->json($wahana);
    }
    public function kuliner()
    {
        $kuliner = new Kuliner();
        $kuliner = $kuliner->get();
        return response()->json($kuliner);
    }
    public function user()
    {
        $user = new User();
        $user = $user->get();
        return response()->json($user);
    }
    public function login(Request $request)
    {
        // dd($request->email);
        $login = User::where('email',$request->email)->first();
        if ($login!=null) {
            return response()->json(array('data'=>$login));
        }else{
            return response()->json(array('data'=>'Email not found'));
        }
    }
}
