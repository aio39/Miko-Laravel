<?php

namespace App\Http\Controllers;

use App\Http\Resources\ConcertAddedScorePerTimeCollection;
use App\Models\Concert;
use App\Models\ConcertAddedScorePerTime;
use App\Http\Requests\StoreConcertAddedScorePerTimeRequest;
use App\Http\Requests\UpdateConcertAddedScorePerTimeRequest;
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

}
