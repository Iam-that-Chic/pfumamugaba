<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mukando;
use App\Models\Payment;
use App\Models\Userpoint;

class PaymentsController extends Controller
{
    //
    public function create($id)
    {
        //dd($id);
        $mukando=Mukando::find($id);
       // dd($mukando);
      return view('payments.create',compact('mukando'));
    }
    public function store(Request $request){
        $payment = new Payment;
        $payment->mukando_id = $request->input('mukando_id');
        $payment->user_id = $request->input('user_id');
        $payment->amount = number_format($request->input('amount'),2);
        $payment->save();
        app('App\Http\Controllers\UserpointsController')->create($request, $payment->amount);
        return redirect()->back()
        ->with('success', 'payment created  ');
    }
}
