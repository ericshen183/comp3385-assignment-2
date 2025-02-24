<?php

namespace App\Http\Controllers;
use App\Mail\Feedback;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function create() {
        return view('feedback-form');
    }

    public function send(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'comments' => 'required'
        ]);

        try {
            Mail::to('007e9b4317-fd23ab@inbox.mailtrap.io')->send(new Feedback($request->name, $request->email, $request->comments));
        } catch (\Exception $e) {
            return back()->withErrors(['email' => 'Failed to send email: ' . $e->getMessage()]);
        }

        return redirect('/feedback/success');
    }

    public function success() {
        return view('success');
    }
}