<?php

namespace ThreeOh\Http\Controllers;

use Illuminate\Contracts\Mail\Mailer;
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
     * @param Mailer $mailer
     *
     * @return View
     */
    public function postContact(Mailer $mailer)
    {
        $this->validate($this->request, ['body' => 'required', 'email' => 'required|email']);

        $recaptcha = new ReCaptcha(env('RECAPTCHA_SECRET'));
        $resp      = $recaptcha->verify($this->request->input('g-recaptcha-response'), $this->request->getClientIp());

        if (! $resp->isSuccess()) {
            return redirect()->route('contact')->withInput($this->request->input())->with('captcha_errors', $resp->getErrorCodes());
        }

        $email = $this->request->input('email');

        $mailer->send('emails.contact', ['body' => $this->request->input('body')], function ($m) use ($email) {
            $m->from($email);
            $m->to(env('MAIL_TO'))->subject(env('APP_NAME') . ' - Contact Form');
        });

        return redirect()->route('contact')->with('success', true);
    }
}
