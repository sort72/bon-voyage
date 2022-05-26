<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConversationRequest;
use Illuminate\Http\Request;
use App\Models\Conversation;
use App\Models\Message;
use Illuminate\Support\Facades\Storage;

class ConversationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view('pages.dashboard.conversation.index');
    }

    public function show(Conversation $conversation){
        $conversation->loadMissing('messages');
        return view('pages.dashboard.conversation.show', compact('conversation'));
    }

    public function update(ConversationRequest $request, Conversation $conversation){

        $conversation->update(['status' => 'waiting_client_response']);

        $conversation->messages()->create([
            'admin_id' => auth()->user()->id,
            'message_body' => $request->message
        ]);

        return redirect()->route('dashboard.conversation.show', $conversation->id)->with('success', 'Mensaje enviado con éxito al cliente.');
    }

}
