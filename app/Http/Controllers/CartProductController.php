<?php

namespace App\Http\Controllers;

use App\Models\CartProduct;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\CartProductCollection;
use function App\Helper\applyDefaultFSW;

class CartProductController extends Controller
{
    public function __construct(){
//        header('Access-Control-Allow-Origin:*');
//        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
//        $query = CartProduct::query();
//        $query = applyDefaultFSW($request, $query);
//
//        return new CartProductCollection($query->paginate($request->get('per_page') ?: 40));
//        return CartProduct::with('products')
//            ->get();
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
        $cartProduct = null;
        $user_id = $request->user_id;
        $cart = Cart::where('user_id', $user_id);
        $cart_id = $cart->first()->id;
        //size, color, product_id가 같고 quantity만 다르면 quantity만 업데이트
        $condition = CartProduct::where('size', $request->size)->where('color', $request->color)->where('product_id', $request->product_id)->first();
//        dd($condition);
        if ($condition) {
//        if(CartProduct::where('size',$request->size))
            $cartProduct = CartProduct::where('cart_id',$cart_id)->where('size', $request->size)->where('color', $request->color)->where('product_id', $request->product_id)->update(['quantity'=>$request->quantity]);
        }else{
            $cartProduct = new CartProduct();
            $cartProduct->product_id = $request->product_id;
            $cartProduct->cart_id = $cart_id;
            $cartProduct->size = $request->size;
            $cartProduct->color = $request->color;
            $cartProduct->quantity = $request->quantity;
            $cartProduct->save();
        }
        return $cartProduct;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CartProduct  $cartProduct
     * @return \Illuminate\Http\Response
     */
    public function show($cart_id)
    {
//        return CartProduct::where('cart_id', $cart_id)
//            ->join('products', 'product_id', '=', 'products.id')
//            ->get();
//        $user_id = $request->user_id;
//        $cart = Cart::where('user_id', $user_id);
//        $cart_id = $cart->first()->id;
        return CartProduct::where('cart_id', $cart_id)
            ->with('products')
            ->get();

//        $cartProduct = new CartProduct();
//        CartProduct::with('products')->get();
//        dd(CartProduct::with('products')->get());
//        return $cartProduct->products();
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CartProduct  $cartProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(CartProduct $cartProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CartProduct  $cartProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CartProduct $cartProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CartProduct  $cartProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy($cartId)
    {
        return CartProduct::destroy($cartId);
    }
}
