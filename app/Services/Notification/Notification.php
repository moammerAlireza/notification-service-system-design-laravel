<?php
namespace App\Services\Notification;


 use App\Models\User;
 use Illuminate\Mail\Mailable;
 use Illuminate\Support\Facades\Mail;

 class Notification
 {
     public function sendEmail(User $user,Mailable $mailable)
     {
         Mail::to($user)->send($mailable);
     }
 }
