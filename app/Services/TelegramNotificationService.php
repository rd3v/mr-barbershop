<?php 
namespace App\Services;

use NotificationChannels\Telegram\TelegramMessage;
use Illuminate\Notifications\Notification;

class TelegramNotificationService extends Notification {

	public function via($notifiable) {
		return ['telegram'];
	}

	public function toTelegram($notifiable) {
		$url = url('/invoice/');

        return TelegramMessage::create()
            // Optional recipient user id.
            ->to($notifiable->telegram_user_id)
            // Markdown supported.
            ->content($notifiable->text)

            // (Optional) Blade template for the content.
            // ->view('notification', ['url' => $url])

            // (Optional) Inline Buttons
            ->button('View Invoice', $url)
            ->button('Download Invoice', $url)
            // (Optional) Inline Button with callback. You can handle callback in your bot instance
            ->buttonWithCallback('Confirm', 'confirm_invoice ');		
	}

}

?>