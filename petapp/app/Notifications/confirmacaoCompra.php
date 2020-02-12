<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class confirmacaoCompra extends Notification
{
    use Queueable;
    public date;
    public client;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $user, string $delivery_day)
    {
        $this->$client = $user;
        $this->date = $delivery_day;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $url = url('localhost:8000/tabs/home');

        return (new MailMessage)
                    ->greeting('Compra confirmada.')
                    ->line('Olá, '.$this->$client->name)
                    ->line('Sua compra foi realizada com sucesso :)')
                    ->line('A data prevista para a entrega do seu pedido é: '.$this->date) //adicionar data de entrega
                    ->action('Voltar as compras.',$url) //botão
                    ->line('Obrigada pela compra!');
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
            //
        ];
    }
}
