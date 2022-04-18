<?php

namespace App\Http\Controllers;

use App\Models\CartProduct;
use App\Models\Concert;
use App\Models\Order;
use App\Models\User;
use App\Models\Cart;
use App\Models\OrderProduct;
use App\Models\CoinHistory;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = $request->user_id;
        $product_id=$request->product_id;
        $order = new Order();
        $user = User::find($user_id);
        $cart_id = Cart::find($user_id)->id;
//        dd($cart_id);
        if($user-> coin < $request->total_price) {
            return response()->json("코인 부족",401);
        }else {
            foreach ($product_id as $key => $pId) {

                $product = Product::find($pId);
                $seller_id = Concert::find($product->concert_id)->user_id;

                $order->user_id = $user_id;
                $order->total_price = $request->total_price;
                $order->state = $request->state;
                $order->address = $request->address;
                $order->save();
                $order->products()->attach([$pId => ['quantity' => $request->quantity[$key]]]);

                User::where('id', $seller_id)->decrement('coin', -1 * $request->total_price);
                User::where('id', $user_id)->decrement('coin', $request->total_price);

                $buyer_coin_history_data = ["user_id"=> $user_id, "product_id" => $pId, "type"=>  4 , "variation" => -1 * ($product->price*$request->quantity[$key]) ] ;
                $seller_coin_history_data = ["user_id"=> $seller_id, "product_id" => $pId, "type"=>  6,
                    "variation" => ($product->price*$request->quantity[$key]) ] ;

                CoinHistory::create($seller_coin_history_data);
                CoinHistory::create($buyer_coin_history_data);

                //  구매완료 후 장바구니에서 삭제
//                dd();
                CartProduct::where('cart_id', $cart_id)->delete();
            }


            return $order;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show($userId)
    {
        $orderId = Order::where('user_id',$userId)->with('products')->first()->id;
        $orderProduct = OrderProduct::where('order_id',$orderId)->with('products')->get();
        return $orderProduct;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}



