<?php

namespace Nasteka\Contact\Components;

use Cms\Classes\ComponentBase;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;


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
        $name = Input::get('name');
        $email = Input::get('email');
        $content = Input::get('content');

        $validator = Validator::make(
            [
                'name' => $name,
                'email' => $email,
                'content' => $content,
            ],
            [
                'name' => 'required|min:3',
                'email' => 'required|email',
                'content' => 'required'
            ]
        );

        if ( $validator->fails() ) {

            // Ajax Validation
            return ['#result' => $this->renderPartial(
                'contactform::messages',
                [
                    'errorMsgs' => $validator->messages()->all(),
                    'fieldMsgs' => $validator->messages()
                ]
            )];

            // Standart Validation - with refresh page
//            return Redirect::back()
//                ->withInput()
//                ->withErrors($validator);

        } else {
            // The given data did not pass validation
            // These variables are available inside the message as Twig
            $vars = [
                'name' => $name,
                'email' => $email,
                'content' => $content
            ];

            Mail::send('nasteka.contact::mail.message', $vars, function($message) {

                $message->to('gmgtest97@gmail.com', 'Admin Person');
                $message->subject('New message from contact form');

            });

        }
    }
}
