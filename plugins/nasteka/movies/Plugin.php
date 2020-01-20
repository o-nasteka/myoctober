<?php namespace Nasteka\Movies;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
    }

    public function registerFormWidgets()
    {
        return [
          'Nasteka\Movies\FormWidgets\Actorbox'  => [
            'label' => 'Actorbox field',
            'code' => 'actorbox'
          ]
        ];
    }

    public function registerSettings()
    {
    }
}
