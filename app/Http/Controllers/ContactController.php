<?php

namespace ThreeOh\Http\Controllers;

use Illuminate\View\View;
use ReCaptcha\ReCaptcha;

class ContactController extends Controller
{
    /**
     * Display the contact page
     *
     * @return View
     */
    public function getContact()
    {
        return view('contact');
    }

    /**
     * Process the contact form
     *
     * @return View
     */
    public function postContact()
    {
        $this->validate($this->request, ['message' => 'required', 'email' => 'required|email']);

        $recaptcha = new ReCaptcha(env('RECAPTCHA_SECRET'));
        $resp      = $recaptcha->verify($this->request->input('g-recaptcha-response'), $this->request->getClientIp());

        if (! $resp->isSuccess()) {
            return redirect()->route('contact')->withInput($this->request->input())->with('captcha_errors', $resp->getErrorCodes());
        }

        return redirect()->route('contact')->with('success', true);
    }
}
