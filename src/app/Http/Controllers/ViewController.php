<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function index()
    {
        $title = "Toto je hlavna stranka mojej stranky";
        $addr = Address::all();
        //$addr = [];
        return view('index', [
            'title' => $title,
            'address' => $addr
        ]);
    }

    public function home()
    {
        return view('home');
    }

    public function saveContact(Request $request)
    {
        $senderName = $request->input('contact_name', null);
        $senderEmail = $request->input('contact_email', null);
        $senderMessage = $request->input('contact_message', null);

        $time = $request->attributes->get('time');

        if(!empty($senderEmail)) {
            /** @var User $user */
            $user = User::query()->where('email', $senderEmail)->first();
            if($user) {
                $newMessage = new Contact();
                if(isset($time)) {
                    $newMessage->name = $time;
                } else {
                    $newMessage->name = $senderName;
                }
                $newMessage->email = $senderEmail;
                $newMessage->text = $senderMessage;
                $newMessage->user_id = $user->id;
                $newMessage->save();
            }
        }

        return redirect()->to('/home');
    }
}
