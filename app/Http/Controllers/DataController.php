<?php

namespace App\Http\Controllers;

use App\Http\Resources\ConcertAddedScorePerTimeCollection;
use App\Http\Resources\CoTiAddedChatPerTimeCollection;
use App\Http\Resources\CoTiAmountDonePerTimeCollection;
use App\Http\Resources\CoTiAmountSuperChatPerTimeCollection;
use App\Http\Resources\CoTiCurEnterUserNumCollection;
use App\Models\Concert;
use App\Models\ConcertAddedScorePerTime;
use App\Http\Requests\StoreConcertAddedScorePerTimeRequest;
use App\Http\Requests\UpdateConcertAddedScorePerTimeRequest;
use App\Models\CoTiAddedChatPerTime;
use App\Models\CoTiAmountDonePerTime;
use App\Models\CoTiAmountSuperChatPerTime;
use App\Models\CoTiCurEnterUserNum;
use Carbon\Carbon;
use Illuminate\Http\Request;
use function App\Helper\applyDefaultFSW;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function concertAddedScorePerTime(Request $request)
    {
        $query = ConcertAddedScorePerTime::query();
        $query = applyDefaultFSW($request, $query);

        return new ConcertAddedScorePerTimeCollection($query->paginate($request->get('per_page') ?: 1000));
    }

    public function coTiAddedChatPerTime(Request $request)
    {
        $query = CoTiAddedChatPerTime::query();
        $query = applyDefaultFSW($request, $query);

        return new CoTiAddedChatPerTimeCollection($query->paginate($request->get('per_page') ?: 1000));
    }

    public function coTiAmountDonePerTime(Request $request)
    {
        $query = CoTiAmountDonePerTime::query();
        $query = applyDefaultFSW($request, $query);

        return new CoTiAmountDonePerTimeCollection($query->paginate($request->get('per_page') ?: 1000));
    }

    public function coTiAmountSuperChatPerTime(Request $request)
    {
        $query = CoTiAmountSuperChatPerTime::query();
        $query = applyDefaultFSW($request, $query);

        return new CoTiAmountSuperChatPerTimeCollection($query->paginate($request->get('per_page') ?: 1000));
    }

    public function coTiCurEnterUserNum(Request $request)
    {
        $query = CoTiCurEnterUserNum::query();
        $query = applyDefaultFSW($request, $query);

        return new CoTiCurEnterUserNumCollection($query->paginate($request->get('per_page') ?: 1000));
    }


}
