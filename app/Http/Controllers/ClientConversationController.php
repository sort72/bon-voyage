<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConversationRequest;
use Illuminate\Http\Request;
use App\Models\Conversation;
use App\Models\Message;
use Illuminate\Support\Facades\Storage;

class ClientConversationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view('pages.external.user.conversation.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('pages.external.user.conversation.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\ConversationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ConversationRequest $request){

        $conversation = Conversation::create([
            'client_id' => Auth()->user()->id,
            'status' => 'waiting_admin_response',
        ]);

        $conversation->messages()->create([
            'message_body' => $request->message
        ]);

        return redirect()->route('external.profile.conversation.index')->with('success', 'Mensaje enviado con éxito. Espera una respuesta de los administradores.');
    }

    public function show(Conversation $conversation){
        if($conversation->client_id != auth()->user()->id) return redirect()->route('external.profile.conversation.index');

        $conversation->loadMissing('messages');
        return view('pages.external.user.conversation.show', compact('conversation'));
    }

    public function newMessage(ConversationRequest $request, Conversation $conversation){

        $conversation->update(['status' => 'waiting_admin_response']);

        $conversation->messages()->create([
            'message_body' => $request->message
        ]);

        return redirect()->route('external.profile.conversation.show', $conversation->id)->with('success', 'Mensaje enviado con éxito. Espera una respuesta de los administradores.');
    }

    public function close(Request $request, Conversation $conversation)
    {
        if($conversation->client_id != auth()->user()->id) return redirect()->route('external.profile.conversation.index');

        $conversation->update(['status' => 'closed']);

        return redirect()->route('external.profile.conversation.show', $conversation->id)->with('success', 'Conversación finalizada con éxito. Ya no se aceptan más respuestas.');
    }
}
