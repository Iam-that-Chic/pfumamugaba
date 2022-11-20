<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mukando;
use App\Models\MukandoUser;
class MukandoController extends Controller
{
    //
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'end_date' => 'required',
            'monthly' => ['required'],
            'target' => 'required',
            'user_id' => 'required',
          
           
        ]);
        $mukando = new Mukando;
        $mukando->name = $request->input('name');
        $mukando->description = $request->input('description');
        $mukando->target = $request->input('target');
        $mukando->monthly = $request->input('monthly');
        $mukando->end_date = $request->input('end_date');
        $mukando->save();
        $user_id = $request->input('user_id');
       app('App\Http\Controllers\MukandoUsersController')->join($user_id,$mukando->id);
        return response()->json(['success' => 'Group successfully created'], 200);
    }
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'end_date' => 'required',
            'monthly' => ['required'],
            'target' => 'required',
            'id' => 'required',
        ]);
        $mukando =  Mukando::find($request->id);
        $mukando->name = $request->input('name');
        $mukando->description = $request->input('description');
        $mukando->target = $request->input('target');
        $mukando->monthly = $request->input('monthly');
        $mukando->end_date = $request->input('end_date');
        $mukando->save();
      
        return response()->json(['success' => 'Group successfully update'], 200);

    }
    public function view($id)
    {
        $mukando=Mukando::find($id);
       // return view('users.view-mukando',compact('mukando'));
        return response()->json([$mukando], 200);

    }
}
