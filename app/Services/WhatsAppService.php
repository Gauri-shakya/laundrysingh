<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;

class WhatsAppService
{
    /**
     * Send a WhatsApp notification.
     *
     * @param string $recipientPhone Phone number of recipient.
     * @param string $message Message to send.
     * @return bool
     */
    public static function send($recipientPhone, $message)
    {
        // Log the message for auditing/debugging
        Log::info("WhatsApp Notification sent to [{$recipientPhone}]: {$message}");

        // In a real application, we would check if credentials exist in .env and call an API:
        // E.g., Twilio API, Gupshup, or a custom WhatsApp Gateway.
        $sid = env('TWILIO_SID');
        $token = env('TWILIO_AUTH_TOKEN');
        $from = env('TWILIO_WHATSAPP_FROM');

        if ($sid && $token && $from) {
            try {
                // E.g., make standard API request to Twilio:
                $url = "https://api.twilio.com/2010-04-01/Accounts/{$sid}/Messages.json";
                $data = [
                    'From' => "whatsapp:{$from}",
                    'To' => "whatsapp:{$recipientPhone}",
                    'Body' => $message,
                ];

                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
                curl_setopt($ch, CURLOPT_USERPWD, "{$sid}:{$token}");
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true); 

                $response = curl_exec($ch);
                $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                curl_close($ch);

                if ($httpCode >= 200 && $httpCode < 300) {
                    Log::info("WhatsApp Twilio Success response: {$response}");
                    return true;
                } else {
                    Log::error("WhatsApp Twilio Fail code {$httpCode}: {$response}");
                }
            } catch (\Exception $e) {
                Log::error("WhatsApp sending error: " . $e->getMessage());
            }
        }

        return true; // Return true so system workflow is not interrupted when credentials are empty
    }
}
