<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCoinHistoryRequest;
use App\Http\Requests\UpdateCoinHistoryRequest;
use App\Http\Resources\CoinHistoryCollection;
use App\Http\Resources\CoinHistoryResource;
use App\Models\CoinHistory;
use App\Models\User;
use App\Models\UserTicket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use function App\Helper\applyDefaultFSW;

class CoinHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = CoinHistory::query();
        $query = applyDefaultFSW($request, $query);

        return new CoinHistoryCollection($query->paginate($request->get('per_page') ?: 40));

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreCoinHistoryRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCoinHistoryRequest $request)
    {
        $input = $request->all();

        DB::beginTransaction();

        try {

            User::query()->where('id', Auth::id())->decrement('coin', $request->variation);
            $coinHistory = CoinHistory::create($input);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw  $e;
        }

        return (new CoinHistoryResource($coinHistory))->response();
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\CoinHistory $coinHistory
     * @return \Illuminate\Http\Response
     */
    public function show(CoinHistory $coinHistory)
    {
        return (new CoinHistoryResource($coinHistory))->response();
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateCoinHistoryRequest $request
     * @param \App\Models\CoinHistory $coinHistory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCoinHistoryRequest $request, CoinHistory $coinHistory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\CoinHistory $coinHistory
     * @return \Illuminate\Http\Response
     */
    public function destroy(CoinHistory $coinHistory)
    {
        $coinHistory->deleteOrFail();

        return response(["msg" => 'sucess to delete chat, id:' . $coinHistory->id]);
    }
}
