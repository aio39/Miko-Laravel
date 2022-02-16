<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCoinHistoryRequest;
use App\Http\Requests\UpdateCoinHistoryRequest;
use App\Models\CoinHistory;

class CoinHistoryController extends Controller
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
     * @param  \App\Http\Requests\StoreCoinHistoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCoinHistoryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CoinHistory  $coinHistory
     * @return \Illuminate\Http\Response
     */
    public function show(CoinHistory $coinHistory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CoinHistory  $coinHistory
     * @return \Illuminate\Http\Response
     */
    public function edit(CoinHistory $coinHistory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCoinHistoryRequest  $request
     * @param  \App\Models\CoinHistory  $coinHistory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCoinHistoryRequest $request, CoinHistory $coinHistory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CoinHistory  $coinHistory
     * @return \Illuminate\Http\Response
     */
    public function destroy(CoinHistory $coinHistory)
    {
        //
    }
}
