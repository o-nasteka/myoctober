<?php namespace Nasteka\Movies;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
        return [
            'Nasteka\Movies\Components\Actors' => 'actors'
        ];
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
