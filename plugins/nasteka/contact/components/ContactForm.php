<?php

namespace Nasteka\Contact\Components;

use Cms\Classes\ComponentBase;
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
}
