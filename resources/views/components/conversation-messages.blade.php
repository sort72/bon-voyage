<div class="h-96 overflow-auto grid grid-cols-3 gap-3 p-4 border border-gray-500 rounded-md">
    @foreach ($conversation->messages as $message)
        @if ($message->admin_id)
            <div class="col-span-2 p-4 h-fit {{ $perspective !== 'admin' ? 'col-start-1 bg-blue-100' : 'col-start-2 bg-blue-300' }} ">
                <p>{!! nl2br($message->message_body) !!} <br></p>
                <small
                    class="flex justify-end">{{ $message->admin->name . ' ' . $message->admin->surname . ' a las ' . DateHelper::beautify($message->created_at, 'short_complete_with_time') }}</small>
            </div>
        @else
            <div class="col-span-2 p-4 h-fit {{ $perspective == 'admin' ? 'col-start-1 bg-blue-100' : 'col-start-2 bg-blue-300' }}">
                <p>{!! nl2br($message->message_body) !!} <br></p>
                <small
                    class="flex justify-end">{{ $perspective == 'admin' ? $conversation->client->name . ' ' . $conversation->client->surname : '' }} {{ DateHelper::beautify($message->created_at, 'short_complete_with_time') }}</small>
            </div>
        @endif
    @endforeach

    @if ($conversation->status == 'closed')
        <div class="col-span-3 text-center text-gray-600 italic">
            {{ $perspective == 'admin' ? 'El cliente finalizó' : 'Finalizaste' }} la conversación. No se pueden enviar más mensajes.
        </div>
    @endif
</div>
