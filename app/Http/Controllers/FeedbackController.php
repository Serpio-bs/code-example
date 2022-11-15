<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Feedback;

class FeedbackController extends Controller
{
    public function create()
    {
        return view('feedback.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'message' => 'required',
            'email' => 'required|email',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10'
        ]);

        Feedback::create($request->all());

        return redirect()->route('feedback.create')->with('success','Сообщение отправлено успешно.');
    }
}
