<?php

namespace Nasteka\Contact\Components;

use Cms\Classes\ComponentBase;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;

// use Nasteka\Contact\Models\Contact;

/**
 * Class Contact
 * @package Nasteka\Contact\Components
 */
class ContactForm extends ComponentBase
{
    /**
     * @return array
     */
    public function componentDetails()
    {
        return [
            'name' => 'Contact form',
            'description' => 'Show contact form'
        ];
    }


    /**
     * Contact Components use this onSubmitContactForm
     */
    public function onSubmitContactForm()
    {
        // These variables are available inside the message as Twig
        $vars = [
            'name' => Input::get('name'),
            'email' => Input::get('email'),
            'content' => Input::get('content')
        ];

        Mail::send('nasteka.contact::mail.message', $vars, function($message) {

            $message->to('gmgtest97@gmail.com', 'Admin Person');
            $message->subject('New message from contact form');

        });
    }
}
