<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreChatRequest;
use App\Http\Requests\UpdateChatRequest;
use App\Http\Resources\ChatCollection;
use App\Http\Resources\ChatResource;
use App\Models\Chat;
use Illuminate\Http\Request;
use function App\Helper\applyDefaultFSW;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Chat::query();
        $query = applyDefaultFSW($request, $query);

        return new ChatCollection($query->paginate($request->get('per_page') ?: 40));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreChatRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreChatRequest $request)
    {
        $input = $request->all();
        $chat = Chat::create($input);

        return (new ChatResource($chat))->response();


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function show(Chat $chat)
    {
        return (new ChatResource($chat))->response();
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateChatRequest  $request
     * @param  \App\Models\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateChatRequest $request, Chat $chat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chat $chat)
    {
        $chat->deleteOrFail();

        return response(["msg"=>'sucess to delete chat, id:'.$chat->id]);
    }
}
