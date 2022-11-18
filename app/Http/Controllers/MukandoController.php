<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mukando;
use App\Models\MukandoUser;
class MukandoController extends Controller
{
    //
    public function create()
    {
        //
        return view('mukando.create-mukando');
    }
    public function save(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'end_date' => 'required',
            'monthly' => ['required'],
            'target' => 'required'
        ]);
        $mukando = new Mukando;
        $mukando->name = $request->input('name');
        $mukando->description = $request->input('description');
        $mukando->target = number_format($request->input('target'),2);
        $mukando->monthly = number_format($request->input('monthly'),2);
        $mukando->end_date = $request->input('end_date');
        $mukando->save();
       // $id=$mukando->id;
       // $user=auth()->user()->id;
        //dd(auth()->user()->id);
       app('App\Http\Controllers\MukandoUsersController')->create($request,1,$mukando->id);
        return redirect()->back()
        ->with('success', 'mukando created  ');
    }
    public function view($id)
    {
        $mukando=Mukando::find($id);
        return view('users.view-mukando',compact('mukando'));
    }
}
