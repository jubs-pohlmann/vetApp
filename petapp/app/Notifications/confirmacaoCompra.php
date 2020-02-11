<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class confirmacaoCompra extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
    public function toMail($notifiable, $product)
    {
        $url = url();
        $client = $notifiable;
        $product = $product;

        return (new MailMessage)
                    ->greeting('Compra confirmada.')
                    ->line('Olá, '.$client->name)
                    ->line('Sua compra de'.$product->name.'foi realizada com sucesso :)')
                    ->line('A data prevista para a entrega do seu pedido é: ') //adicionar data de entrega
                    ->action('Voltar as compras.'.$url) //botão
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
