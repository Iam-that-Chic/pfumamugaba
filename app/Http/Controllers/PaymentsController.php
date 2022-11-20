<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mukando;
use App\Models\Payment;
use App\Models\Userpoint;
use Illuminate\Support\Facades\Http;

class PaymentsController extends Controller
{
    //
    public function success()
    {
      return response()->json(['sucess' => "payment successfully done"], 200);
    }
    public function initiate(){
        try{
            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'Authorization' => 'Bearer gDoHC3w+PF/aex+pu+qUY70LE2RRaSyKXA8jvnaRMNQF1buw9vJ2FxV1OKGWwAqefjYFY2BPqDd5XJaSS6y0kWUPWI6B0KQ+ezyjMbUsFUf43iKlQTYbjxlaRjUgOsjg'
            ])->post('https://seerbitapi.com/api/v2/payments',
            [
                        "publicKey"=> "SBTESTPUBK_o6UBYM4iP1v979KnsP9eExKn2YM4ePUz",
                        "amount" =>"10.00",
                        "currency" =>"NGN",
                        "country"=> "NG",
                        "paymentReference"=> "P12wqQN".now(),
                        "email"=> "pamelamuzoma@gmail.com",
                        "productId"=>"15013",
                        "productDescription"=> "touch badge",
                        "callbackUrl"=> "http://127.0.0.1:8001/success",
                        "hash"=> "cfb5464ea21cce315ea72fb28f7ea45c4b61c443783eeff82dea98e57d445e15",
                        "hashType"=> "sha256",
                    
            ])->json();
            if (isset($response['message'])) {
              
                 return response()->json(['errors' => $response['message']], 401);
    
            } else {
                return response()->json(['redirectLink' => $response['data']['payments']['redirectLink']], 200);
            }
            
        }catch (\Exception $exception){
            echo $exception->getMessage();
            return response()->json(['errors' => $exception->getMessage()], 401);
        }
        
        
    }
}
