<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Userpoint;
class UserpointsController extends Controller
{
    //
    public function create(Request $request,$payment){
$points=new Userpoint;
if($payment<=10){
    $point=5;
}
elseif($payment<=20){
    $point=7;
}
elseif($payment<=100){
    $point=10;
}elseif($payment>100){
    $point=100;
}
if(Userpoint::where('user_id',2)->exists()){
    
$current_point=Userpoint::find('1');
$my_point=$current_point->points+$point;
// edit($request1,1,$my_point);
app('App\Http\Controllers\UserpointsController')->edit($request,1,$my_point);
}
else{
    $points['points']=$point;
    $points['user_id']=1;
    $points->save();
}

    }
  public function edit(Request $request, $id,$point)
  {
    $user=Userpoint::find($id);
    $user['points']=$point;
    $user->update();
  }
  public function show()
  {
    if(Userpoint::where('user_id',1)->exists()){
        $point=Userpoint::findorfail(1);
        return view('users.loyalty-points',compact('point'));
    }
   
    
  }
}
