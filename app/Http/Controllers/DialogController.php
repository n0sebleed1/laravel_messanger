<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Dialog;
use App\Message;

class DialogController extends Controller
{
    public function show(){
        $user = Auth::user();
        $sender = Dialog::where('sender', $user->id)->get();

        return view('main', [ 'contacts'=>$sender ]);
    }

    public function dialog($id){
        
        $user = Auth::user();
        $dialogList = new Dialog;
        $dialogSelected = new Dialog;
        $message = new Message;

        $recipient = Dialog::where('recipient', $id)->where('sender', $user->id)->first();
        $dialogSelected = Dialog::where('recipient', $id)->where('sender', $user->id)->first();

        $message = Message::where(function ($query) use ($user, $id) {
            $query->where('sender', $user->id)
                  ->where('recipient', $id);
        })->orWhere(function ($query) use ($user, $id) {
            $query->where('sender', $id)
                  ->where('recipient', $user->id);
        })
        ->orderBy('created_at', 'asc')
        ->get();

        if ($recipient == null) {
            $dialogList = Dialog::create([
                'recipient' => $id,
                'sender' => $user->id
            ]);

            $recipient = Dialog::where('recipient', $id)->where('sender', $user->id)->first();
        }

        if ($dialogSelected->new_messages > 0){
            $newMessages = 0;
            $dialogSelected->new_messages = $newMessages;
            $dialogSelected->save();
        }

        return view('dialog', [ 'message'=>$message,  'recipient'=>$recipient]);
    }

    public function send($id, Request $request){
        $user = Auth::user();
        $message = new Message;
        $dialogList = new Dialog;

        $dialogList = Dialog::where('recipient', $user->id)->where('sender', $id)->first();
        $newMessages = $dialogList->new_messages;
        $newMessages++;
        $dialogList->new_messages = $newMessages;
        $dialogList->save();

        $message = Message::create([
            'recipient' => $id,
            'sender' => $user->id,
            'text' => $request->text
        ]);

        return back();
    }
}
