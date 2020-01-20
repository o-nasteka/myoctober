<?php

namespace Nasteka\Movies\FormWidgets;


use Backend\Classes\FormWidgetBase;
use Config;
use Nasteka\Movies\Models\Actor;


/**
 * Class Actorbox
 * @package Nasteka\Movies\FormWidgets
 */
class Actorbox extends FormWidgetBase
{
    /**
     * @return array
     */
    public function widgetDetails()
    {
        return [
            'name' => 'Actorbox',
            'description' => 'Field for adding actors'
        ];
    }

    /**
     * @return mixed|string
     */
    public function render()
    {
        $this->prepereVars();
//    dump($this->vars['selectedValues']);
        return $this->makePartial('widget');
    }

    /**
     * prepare Vars
     */
    public function prepereVars()
    {
        $this->vars['id'] = $this->model->id;

        // use Accessors in Actor model getFullNameAttribute()
        $this->vars['actors'] = Actor::all()->lists('full_name','id');

        // prepare name for our widget -> get in _widget.htm in select input
        $this->vars['name'] = $this->formField->getName().'[]';

        // get selected Actors values
        if( !empty($this->getLoadValue()) ){
            $this->vars['selectedValues'] = $this->getLoadValue();
        } else {
            $this->vars['selectedValues'] = [];
        }

    }


    /**
     * load widget Assets
     */
    public function loadAssets()
    {
        $this->addCss('css/select2.css');
        $this->addJs('js/select2.js');
    }

}
