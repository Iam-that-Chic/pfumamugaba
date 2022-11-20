<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Http;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\Validator;
use Laravel\Passport\Client as OClient;
use GuzzleHttp\Client;
class UserController extends Controller
{
    use HasApiTokens, HasFactory, Notifiable;

    public function register(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6',
        ]);
        $user= User::create([
            'name' =>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password)
        ]);

       // $access_token = $user->createToken('Pfumamugaba')->accessToken;
        //return the access token we generated in the above step
        return response()->json([ 'accessToken' => $user], 200);
    }

    public function login(Request $request)
    {
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required|min:8',
        ]);
        $login_credentials=[
            'email'=>$request->email,
            'password'=>$request->password,
        ];
       if(auth()->attempt($login_credentials)){
            //generate the token for the user
            //$user_login_token= auth()->user()->createToken('Pfumamugaba App', ['mukando, create'])->accessToken;
            //$user_login_token= auth()->user()->createToken('Pfumamugaba App')->accessToken;
            //now return this token on success login attempt
            return response()->json([ 'user' => auth()->user()], 200);
        }
        else{
            //wrong login credentials, return, user not authorised to our system, return error code 401
            return response()->json(['error' => 'UnAuthorised Access'], 401);
        }
      //  $laravelPasswordGrantClientId = env('PASSPORT_PERSONAL_ACCESS_CLIENT_ID');
     //   $oClient = OClient::find($laravelPasswordGrantClientId);
     // return response()->json($this->getTokenAndRefreshToken( $request->email, $request->password),200);
    }
    

    public function getTokenAndRefreshToken( $email, $password) {
        $response = Http::asForm()->post('http://pfumamugaba.test/oauth/token', [
            'form_params' => [
                'grant_type' => 'password',
                'client_id' => '97c88508-047a-44e1-a0c6-d6d733f04d4c',
                'client_secret' => '2nujm3J1jkfS2XIeOTWOb9Ot45aYE8IZGOFhS1lT',
                'username' => $email,
                'password' => $password,
                'scope' => '*',
            ],
        ]);
  
        $result = json_decode((string) $response->getBody(), true);
        return $result;
    }

    public function authenticatedUserDetails(){
        //returns details
        return response()->json(['authenticated-user' => auth()->user()], 200);
    }
}
