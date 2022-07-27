<?php
namespace App\Services\Notification;


 use App\Models\User;
 use GuzzleHttp\Client;
 use Illuminate\Mail\Mailable;
 use Illuminate\Support\Facades\Mail;

 class Notification
 {
     public function sendEmail(User $user,Mailable $mailable)
     {
         Mail::to($user)->send($mailable);
     }

     public function sendSms(User $user, String $text)
     {
        $client= new Client();
        $response= $client->post(config('services.sms.uri'),$this->prepareDataForSms($user,$text));
        return $response->getBody();
     }
     private function prepareDataForSms(User $user,String $text)
     {
         $data=
             array_merge(config('services.sms.auth'),
             [
                 'op'=>'send',
                 'message'=>$text,
                 'to'=>[$user->phone_number]
             ],
         );
            return[
             'json'=>$data
         ];
     }
 }
