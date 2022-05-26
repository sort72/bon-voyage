<?php

namespace App\Http\Controllers;

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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('pages.dashboard.conversation.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\ConversationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(){
        $destination = Conversation::create([
            'client_id' => $request->client_id,
            'status' => $request->status,
            'unread_messages_by_client' => $request->unread_messages_by_client,
            'unread_messages_by_admin' => $request->unread_messages_by_admin,
            'created_at' => $request->created_at,
            'updated_at' => $request->updated_at,
            'deleted_at' => $request->deleted_at
        ]);
    }

    public function show(){

    }

    public function newMessage(){

    }
}
