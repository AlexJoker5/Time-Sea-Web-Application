<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\BillingInformation;
use App\Models\Watch;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $userId = $user->id;

        $carts = Cart::where('user_id', $userId)->get();

        $watchIds = $carts->pluck('watch_id')->toArray();
        $watches = null;
        //dd($watchIds);
        if(!$carts->isEmpty()){
            $watches = Watch::whereIn('id', $watchIds)
                    ->orderByRaw("FIELD(id, " . implode(',', $watchIds) . ")")
                    ->get();
        }
        $payment = Payment::where('user_id', $userId)->get();

        //$flag = session('payment_subtotal_updated');
        //$flag = false;
        // if(!$flag){
        //     foreach($payment as $p){
        //         $p->subTotal = 0;
        //         foreach($carts as $cart){
        //             $p->subTotal+= $cart->totalCost;
        //         };
        //         $p->total = $p->subTotal-($p->subTotal * ($p->tax / 100));
        //         $p->update([
        //             'subTotal' => $p->subTotal,
        //             'total' => $p->total,
        //         ]);
        //         break;
        //     };
        //     session(['payment_subtotal_updated' => true]);
        // }

        //dd($payment);
        //dd($watches);

        //dd($carts);
        return view('carts.index', compact('carts', 'watches', 'payment','userId'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    public function updateQuantity(Request $request, $id)
    {
        //$user = Auth::user();
        //dd($user);
        //$userId = $user->id;
        $carts = Cart::findOrFail($id);
        $watchId = $carts->watch_id;
        $watch = Watch::findOrFail($watchId);
        $totalCost = $request->quantity * $watch->price;
        $user_id = $carts->user_id;
        $payment = Payment::where('user_id', $user_id)->get();

        //dd($payment);

        $carts->update([
            'quantity' => $request->quantity,
            'totalCost' => $totalCost,
        ]);

        $cartItems = Cart::where('user_id', $user_id)->get();

        $paymentId = 0;
        $subTotal =0;
        $total =0;

        foreach($payment as $p){
            $paymentId = $p->id;
            $p->subTotal = 0;
            foreach($cartItems as $cart){
                $p->subTotal+= $cart->totalCost;
            };
            $subTotal = $p->subTotal;
            $p->total = $p->subTotal-($p->subTotal * ($p->tax / 100));
            $total = $p->total;
            $p->update([
                'subTotal' => $p->subTotal,
                'total' => $p->total,
            ]);
            break;
        };


        return response()->json([
            'id' => $id,
            'message' => 'Quantity updated successfully',
            'totalCost' => $totalCost,
            'paymentId' => $paymentId,
            'subTotal' => $subTotal,
            'total' => $total,
        ], 200);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $carts = Cart::findOrFail($id);
        $user_id = $carts->user_id;
        $payment = Payment::where('user_id', $user_id)->get();

        $subTotal =0;
        $paymentId = 0;
        $total =0;
        $count =0;

        foreach($payment as $p){
            $paymentId = $p->id;
            $p->subTotal -= $carts->totalCost;
            $subTotal = $p->subTotal;

            $p->total = $p->subTotal-($p->subTotal * ($p->tax / 100));
            $total = $p->total;
            
            $count++;
            $p->update([
                'subTotal' => $p->subTotal,
                'total' => $p->total,
            ]);
            break;
        };

        $carts->delete();

        // $watchIds = $carts->pluck('watch_id')->toArray();
        // $watches = Watch::whereIn('id', $watchIds)
        //             ->orderByRaw("FIELD(id, " . implode(',', $watchIds) . ")")
        //             ->get();
        $watch_id = $carts->watch_id;
        $watches = Watch::findOrFail($watch_id);
        $payment = Payment::findOrFail($paymentId);
        return response()->json([
            'message' => 'Cart delete successfully',
            'carts' => $carts,
            'watches' => $watches,
            'paymentId' => $paymentId,
            'subTotal' => $subTotal,
            'total' => $total,
            'count' => $count,
        ]);
    }
    public function billing(Request $request, $user_id){
        $watch = Watch::all();
        $category = "recommend";
        $watches = Watch::where("category->$category", 1)->get();
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
        $cart = Cart::where('user_id', $user_id)
             ->delete();

        return view('dashboard',['watch'=> $watch, 'watches' => $watches, 'category' => $category]);
    }
}
