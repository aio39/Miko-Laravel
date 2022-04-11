<?php

namespace App\Http\Controllers;

use App\Http\Resources\RecordingCollection;
use App\Http\Resources\RecordingResource;
use App\Models\Recording;
use App\Http\Requests\StoreRecordingRequest;
use App\Http\Requests\UpdateRecordingRequest;
use Illuminate\Http\Request;
use function App\Helper\applyDefaultFSW;

class RecordingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Recording::query();
        $query = applyDefaultFSW($request, $query);

        return new RecordingCollection($query->paginate($request->get('per_page') ?: 40));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreRecordingRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRecordingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Recording $recording
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $query = Recording::query();

        $query = applyDefaultFindById($request, $query);

        return (new RecordingResource($query->findOrFail($id)));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateRecordingRequest $request
     * @param \App\Models\Recording $recording
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRecordingRequest $request, Recording $recording)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Recording $recording
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recording $recording)
    {
        $recording->delete();

        return response()->json($recording);
    }
}
