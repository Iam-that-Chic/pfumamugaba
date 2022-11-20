<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\MukandoUser;
class MukandoUsersController extends Controller
{
    public function index(Request $request)
    {
        $this->validate($request,[
            'user_id'=>'required',
        ]);
        $groups=MukandoUser::where('user_id',$request->user_id)->get();
        return response()->json(['groups' => $groups], 200);
    }
   
    public function join($user_id, $mukando_id)
    {
         $mukando_user = new MukandoUser();
         $mukando_user->user_id = $user_id;
         $mukando_user->mukando_id = $mukando_id;
         $mukando_user->save();
       return response()->json(['success' => 'Successfully joined'], 200);
    }
    public function attemptjoin(Request $request)
    {
        $this->validate($request,[
            'email'=>'required',
            'mukando_id'=>'required',
        ]);
       /* $user = new Invitation();
         $user->mukando_id=$request->mukando_id;
         $user->user_id=$request->user_id;
         $user->mukando_id = $request->mukando_id;
         $user->status = 'pending';
         $user->message = $request->messagge;
        $user->save();*/
        $user = User::where('email', $request->email)->first();
        $this->join($user->id, $request->mukando_id);
        return response()->json(['success' => 'User has been successfully added '], 200);
    }
}
