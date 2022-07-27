<?php

use App\Mail\TopicCreated;
use Illuminate\Support\Facades\Route;
use App\Services\Notification\Notification;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
   $notification= resolve(Notification::class);
   $notification->sendSms(User::find(1),'example sms');
});
