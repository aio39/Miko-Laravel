<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartProduct;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function App\Helper\applyDefaultFSW;
use App\Http\Resources\CartCollection;
use App\Http\Resources\CartResource;

function applyDefaultFindById(Request $request, \Illuminate\Database\Eloquent\Builder $query)
{

}

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
//        $cart = Cart::with('products')->get();

        $cart = new Cart();
//        $product = $cart->products();
        $query = Cart::query();
        $query = applyDefaultFSW($request, $query);

        return new CartCollection($query->paginate($request->get('per_page') ?: 40));
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
        $product_id = $request->product_id;
//        $product = Product::find($product_id);
//        dd($request->product_id);
        $cart = new Cart();
        $cart->user_id = $request->user_id;
        $cart->size = $request->size;
        $cart->color = $request->color;
        $cart->quantity = $request->quantity;
        $cart->save();
        $cart->products()->toggle($product_id);
        return $cart;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show($user_id)
    {
        return Cart::all()->where('user_id',$user_id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
