<?php namespace Nasteka\Contact;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
        return [
            'Nasteka\Contact\Components\ContactForm' => 'contactform'
        ];
    }

    public function registerFormWidgets()
    {
    }

    public function registerSettings()
    {
    }
}
