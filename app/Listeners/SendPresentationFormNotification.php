<?php


namespace App\Listeners;


use App\Events\SentRequestFormPresentation;
use App\Notifications\PresentationForm;
use Illuminate\Support\Facades\Notification;

class SendPresentationFormNotification
{
    public function handle(SentRequestFormPresentation $event)
    {
        Notification::route('mail', ['andrey.shamanskiy@gmail.com', 'ettn@edi.com.ua'])
            ->notify(new PresentationForm(
                $event->presentation->name,
                $event->presentation->phone,
                $event->presentation->email,
                $event->presentation->ip_address,
                $event->presentation->created_at
            ));
    }
}
