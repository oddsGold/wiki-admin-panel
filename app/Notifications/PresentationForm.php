<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PresentationForm extends Notification
{
    use Queueable;

    protected string $name;
    protected string|null $phone;
    protected string $email;
    protected string $ip_address;
    protected string $date;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($name, $phone, $email, $date, $ip_address)
    {
        $this->name = $name;
        $this->phone = $phone;
        $this->email = $email;
        $this->ip_address = $ip_address;
        $this->date = $date;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->greeting('Завантажити презентацію - COTA CRS' . request()->getHost())
            ->subject("Завантажити презентацію - COTA CRS" . request()->getHost())
            ->line( new \Illuminate\Support\HtmlString('Ім`я: <i style="color: #000000">' . $this->name. '</i>'))
            ->line( new \Illuminate\Support\HtmlString('Телефон: <i style="color: #000000">' . $this->phone. '</i>'))
            ->line( new \Illuminate\Support\HtmlString('Е-мейл: <i style="color: #000000">' . $this->email. '</i>'))
            ->line( new \Illuminate\Support\HtmlString('Час: <i style="color: #000000">' . $this->date. '</i>'))
            ->line( new \Illuminate\Support\HtmlString('ІП адреса: <i style="color: #000000">' . $this->ip_address . '</i>'))
            ->line( new \Illuminate\Support\HtmlString("<a target='_blank' href='".url('/')."'>".request()->getHost()."</a>"));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'name' => $this->name,
            'phone' => $this->phone,
            'email' => $this->email,
            'ip_address' => $this->ip_address,
            'date' => $this->date,
        ];
    }
}
