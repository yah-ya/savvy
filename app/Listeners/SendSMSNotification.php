<?php

namespace App\Listeners;

use App\Events\TransferComplete;
use App\Models\Card;
use App\Services\SMS\SmsServiceInterface;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class SendSMSNotification implements ShouldQueue
{

    protected SmsServiceInterface $smsService;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(SmsServiceInterface $smsService)
    {
        $this->smsService = $smsService;
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\TransferComplete  $event
     * @return void
     */
    public function handle(TransferComplete $event)
    {
        $card = Card::find($event->transaction->card_id);
        $destinationCard = Card::find($event->transaction->destination_card);

        $this->smsService->send($card->user->mobile,'Test Message');
        $this->smsService->send($destinationCard->user->mobile,'Test Message');

        Log::info('Sms Send Event Called');
    }
}
