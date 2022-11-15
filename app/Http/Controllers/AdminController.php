<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Mail\FeedbackMailer;
use App\Models\Feedback;

class AdminController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::all();

        return view('admin.index', compact('feedbacks'));
    }

    public function send(Request $request)
    {
        $email = $request->get('email');
        $reply_message = $request->get('reply_message');

        Mail::to($email)->send(new FeedbackMailer($reply_message));

        return redirect()->route('admin.index')->with('success','Сообщение отправлено успешно.');
    }
}
