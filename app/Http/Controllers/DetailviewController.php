<?php

namespace App\Http\Controllers;
use App\Models\Watch;
use App\Models\Cart;
use App\Models\BillingInformation;
use App\Models\Payment;

use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DetailviewController extends Controller
{

    public function detail()
    {
        $watch = Watch::all();

        return view('detailview.detailview', ['watch' => $watch]);
    }
    public function addToChart($userId, $watchId, $price){
        $watch = Watch::all();
        $totalCost = $price;
        if($this->alreadyExist($userId, $watchId) == false) {
            $user = Cart::create([
                'user_id' => $userId,
                'watch_id' => $watchId+1,//because $watch is an index
                'totalCost' => $totalCost,
                
            ]);
            if($this->paymentAlreadyExist($userId) == false){
                // total
                $total = $price - ($price*(0.05));

                $payment = Payment::create([
                    'user_id' => $userId,
                    'subTotal' =>$price,
                    'total' => $total,
                ]);
            }elseif($this->paymentAlreadyExist($userId) == true){
                $payment = Payment::where('user_id', $userId ) -> get();
                
        
                foreach($payment as $p){
                    $p->subTotal += $price;
        
                    $p->total = $p->subTotal-($p->subTotal * ($p->tax / 100));
                    $total = $p->total;
                    
                    $p->update([
                        'subTotal' => $p->subTotal,
                        'total' => $p->total,
                    ]);
                    break;
                };
        
            }
            

        }elseif($this->alreadyExist($userId, $watchId) == true){
            $c = Cart::where('user_id', $userId) -> get();
            // dd($c);
            $totalcost = 0;
            foreach($c as $a){
                if($a->watch_id == $watchId+1){
                    $totalcost = $a->totalCost;
                    break;
                }
            }
            $cart = Cart::where('user_id', $userId)
             ->where('watch_id', $watchId+1)
             ->delete();
             $payment = Payment::where('user_id', $userId ) -> get();
                
        
             foreach($payment as $p){
                 $p->subTotal = $p->subTotal - $totalcost;
     
                 $p->total = $p->subTotal-($p->subTotal * ($p->tax / 100));
                 $total = $p->total;
                 
                 $p->update([
                     'subTotal' => $p->subTotal,
                     'total' => $p->total,
                 ]);
                 break;
             };
        }
        $category = "recommend";
        $watches = Watch::where("category->$category", 1)->get();
        
        return view('dashboard',compact('watch','watches','category'));
    }
    public function alreadyExist($userId,$watchId){
        $watch = null;
        try {
            $watch = Cart::where('user_id', $userId)
                 ->get();
            foreach ($watch as $key => $info){
                if($info->watch_id == $watchId+1){
                    return true;
                }
            }
            return false;
        } catch (\Illuminate\Database\QueryException $e) {
            return false;
        } 
    }
    public function paymentAlreadyExist($userId){

        $watch = Payment::where('user_id', $userId)
                ->get();
        if($watch->isEmpty()){
            return false;
        }else{
            return true;
        }

    }
    public function billing(Request $request, $user_id){
        $watch = Watch::all();
        $list = [$request->input('city'),$request->input('state'),$request->input('zipCode'),$request->input('creditCardNo'),$request->input('creditCartExpireDate')];
        $isnull = false;
        foreach($list as $l){
            if($l == null){
                $isnull = true;
                break;
            }
        }
        if(!$isnull){
            BillingInformation::create([
                'userId' => $user_id,
                'city' => $request->input('city'),
                'state' => $request->input('state'),
                'zipCode' => $request->input('zipCode'),
                'creditCartNo' => $request->input('creditCardNo'),
                'creditCartExpireDate' => $request->input('creditCartExpireDate'),
                
            ]);
        }
        
        return view('dashboard',['watch'=> $watch]);
    }

}
