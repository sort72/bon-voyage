<?php

namespace App\Observers;

use App\Models\Card;
use App\Models\Cart;
use App\Models\Ticket;

class TicketObserver
{
    /**
     * Handle the Ticket "created" event.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return void
     */
    public function created(Ticket $ticket)
    {
        //
    }

    /**
     * Handle the Ticket "updated" event.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return void
     */
    public function updated(Ticket $ticket)
    {
        //
    }

    /**
     * Handle the Ticket "deleted" event.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return void
     */
    public function deleted(Ticket $ticket)
    {
        if($ticket->status == 'paid') {
            if($ticket->cart->card_id) $card = Card::where('id', $ticket->cart->card_id)->first();
            else $card = Card::where('client_id', $ticket->cart->user_id)->first();

            if($card) $card->increment('amount', $ticket->price);
        }

        if($ticket->is_adult && ($ticket->status == 'paid' || $ticket->status == 'reserved')) {
            $user = $ticket->cart->user_id;

            $carts = Cart::where('user_id', $user)->get()->pluck('id');
            $tickets = Ticket::where('flight_id', $ticket->flight_id)->whereIn('cart_id', $carts)->orderBy('passenger_birth_date', 'ASC')->get();
            $adults = 0;
            foreach ($tickets as $Ticket) {
                if($Ticket->is_adult) $adults ++;
                else if(!$adults) {
                    $Ticket->delete();
                }
            }

        }
    }

    /**
     * Handle the Ticket "restored" event.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return void
     */
    public function restored(Ticket $ticket)
    {
        //
    }

    /**
     * Handle the Ticket "force deleted" event.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return void
     */
    public function forceDeleted(Ticket $ticket)
    {
        //
    }
}
