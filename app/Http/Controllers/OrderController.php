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

//        dd($cart_id);
        if($user-> coin < $request->total_price) {
            return response()->json("코인 부족",401);
        }else {
            if(gettype($product_id)=='array') {
//            dd($product_id);
//            $parsedArray = json_decode($product_id);
                foreach ($product_id as $key => $pId) {
                    $cart_id = Cart::find($user_id)->id;
                    $product = Product::find($pId);
                    $seller_id = Concert::find($product->concert_id)->user_id;

                    $order->user_id = $user_id;
                    $order->total_price = $request->total_price;
                    $order->state = $request->state;
                    $order->address = $request->address;
                    $order->quantity = $request->quantity[$key];
//                    dd($request->size);
                    $order->size = $request->size[$key];
                    $order->color = $request->color[$key];
                    $order->save();
//                    dd($key);
                    $order->products()->attach([$pId => ['quantity' => $request->quantity[$key]]]);


                    User::where('id', $seller_id)->decrement('coin', -1 * $request->total_price);
                    User::where('id', $user_id)->decrement('coin', $request->total_price);

                    $buyer_coin_history_data = ["user_id" => $user_id, "product_id" => $pId, "type" => 4, "variation" => -1 * ($product->price * $request->quantity[$key])];
                    $seller_coin_history_data = ["user_id" => $seller_id, "product_id" => $pId, "type" => 6,
                        "variation" => ($product->price * $request->quantity[$key])];

                    CoinHistory::create($seller_coin_history_data);
                    CoinHistory::create($buyer_coin_history_data);

                    //  구매완료 후 장바구니에서 삭제
//                dd();
                    CartProduct::where('cart_id', $cart_id)->delete();
                }
            }else{
                $product = Product::find($product_id);
//                    dd($product_id);
                $seller_id = Concert::find($product->concert_id)->user_id;

                $order->user_id = $user_id;
                $order->total_price = $request->total_price;
                $order->state = $request->state;
                $order->address = $request->address;
                $order->quantity = $request->quantity;
                $order->size = $request->size;
                $order->color = $request->color;
                $order->save();
                $order->products()->attach([$product_id => ['quantity' => $request->quantity]]);

                User::where('id', $seller_id)->decrement('coin', -1 * $request->total_price);
                User::where('id', $user_id)->decrement('coin', $request->total_price);

                $buyer_coin_history_data = ["user_id" => $user_id, "product_id" => $product_id, "type" => 4, "variation" => -1 * ($product->price * $request->quantity)];
                $seller_coin_history_data = ["user_id" => $seller_id, "product_id" => $product_id, "type" => 6,
                    "variation" => ($product->price * $request->quantity)];

                CoinHistory::create($seller_coin_history_data);
                CoinHistory::create($buyer_coin_history_data);

                //  구매완료 후 장바구니에서 삭제
//                dd();
//                    CartProduct::where('cart_id', $cart_id)->delete();
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
        $order = Order::where('user_id',$userId)->with('products')->get();
        $concertId = array();

//        dd($order[9]['products'][0]->concert_id);
        dd($order);
        for($i = 0; $i < count($order); $i++){
            echo json_encode($concertId);
            array_push($concertId, $order[$i]['products'][0]->concert_id);
        }


        $data = array();
        $concertsTitle = array();
        for($i = 0; $i < count($concertId); $i++){
            array_push($data, Concert::where('id', $concertId)->first('title'));
            array_push($concertsTitle, $data[$i]->title);
        }


        for($i = 0; $i < count($order); $i++){
            $order[$i]['products'][0]['concert_title'] = $concertsTitle[$i];
        }
        return $order;
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