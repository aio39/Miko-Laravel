<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreConcertRequest;
use App\Http\Requests\UpdateConcertRequest;
use App\Http\Resources\ConcertCollection;
use App\Http\Resources\ConcertResource;
use App\Models\Concert;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;
use function App\Helper\applyDefaultFSW;

class ConcertController extends Controller
{
    public function __construct()
    {
        // $this->authorizeResource(Concert::class, 'concert');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Concert::query();
        $query = applyDefaultFSW($request, $query);

        $q = $request->get('search');   // 검색
        // Fulltext * 부분 제외 -  " " 로 묶으면 단어 합치기
        if ($q) {
            $query->whereRaw("MATCH(title, artist) AGAINST(? IN BOOLEAN MODE)", $q);
        }

        return new ConcertCollection($query->paginate($request->get('per_page') ?: 40));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreConcertRequest $request)
    {

//        $request->merge([
//            // category_id는 임의로 설정함.
//            'category_id' => 1
//        ]);
//        dd(Carbon::createFromTimestamp($request->all_concert_start_date));

        $request->merge([
            'user_id' => Auth::id()
        ]);

        if ($request->file('cover_image')) {
            $path = $request->file('cover_image')->store('cover_image', 's3'); // s3에 image 저장.
        }
        $input = array_merge($request->except('cover_image'), ['cover_image' => $path]);

        $concert = Concert::create($input);

        return (new ConcertResource($concert))->response();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Concert $concert)
    {
        return (new ConcertResource($concert))->response();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateConcertRequest $request, Concert $concert)
    {
        // Gate::authorize('update', $concert);

        $concert->update();
        // 수정해야함.
        return response()->json($concert);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Concert $concert)
    {
        $concert->delete();

        return response()->json($concert);
    }
}
