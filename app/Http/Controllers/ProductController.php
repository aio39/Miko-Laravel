<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use function App\Helper\applyDefaultFindById;
use function App\Helper\applyDefaultFSW;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Product::query();
        $query = applyDefaultFSW($request, $query);


        return new ProductCollection($query->paginate($request->get('per_page') ?: 40));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreProductRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        if ($request->file('image')) {
            $path = $request->file('image')->store('product_image', 's3'); // s3에 image 저장.
        }

        $input = array_merge($request->except('image'), ['image' => $path]);

        $product = Product::create($input);

        return (new ProductResource($product))->response();
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {

        $query = Product::query();

        $query = applyDefaultFindById($request, $query);

        return (new ProductResource($query->findOrFail($id)));
//        $product = Product::find($id)->with('concerts')->get();
//        $product = Product::find($id)->get();
//        $concertTitle = Product::find($id)->with('concert')->get();
//
//        $array = array();
//        for($i=0; $i < count($concertTitle); $i++){
//            array_push($array, $concertTitle[$i]['concert']->title);
//            $product[$i]['concert_title'] = $array[$i];
//    }
//        return $product;
//        return $concertTitle['concert']->title;

    }


    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateProductRequest $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->fill($request->all());
        $product->updateOrFail();
        return  new ProductResource($product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
