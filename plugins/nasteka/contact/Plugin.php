<?php namespace Nasteka\Contact;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
        return [
            'Nasteka\Contact\Components\ContactForm' => 'contact'
        ];
    }

    public function registerFormWidgets()
    {
    }

    public function registerSettings()
    {
    }
}
