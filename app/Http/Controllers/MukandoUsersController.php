<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MukandoUser;
class MukandoUsersController extends Controller
{
    //
    public function create(Request $request,$user,$mukando)
    {
        // $mukando_user = new Mukando;
        // $mukando_user->user_id = $request->input('user_id');
        // $mukando_user->mukando_id = $request->input('mukando_id');
        // $mukando_user->save();
        $input = $request->all();
         $input['user_id'] =$user;
         $input['mukando_id'] =$mukando;
        MukandoUser::create($input);
    }
    public function index()
    {
        $groups=MukandoUser::all()->where('user_id',1);
        return view('users.index',compact('groups'));
    }
    public function join()
    {
        
        return view('users.join');
    }
    public function save(Request $request)
    {
        // $mukando_user = new Mukando;
        // $mukando_user->user_id = $request->input('user_id');
        // $mukando_user->mukando_id = $request->input('mukando_id');
        // $mukando_user->save();
        $user = new MukandoUser;
         $user->mukando_id=$request->input('mukando_id');
         $user->user_id=$request->input('user_id');
        $user->save();
        return redirect()->back()
        ->with('success', 'mukando joined  ');
    }
}
