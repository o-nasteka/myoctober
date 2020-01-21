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
     * @param mixed $value
     * @return string|void
     * Save value from Widget Actor
     */
    public function getSaveValue($actors)
    {

//        dd($actors);

        $newActorsArray = [];

        foreach ($actors as $actorId) {
            if (!is_numeric($actorId)) {

                // check Actor Full Name
                $actorData = $this->checkNewActorName($actorId);

                // save Actor Full Name
                if($actorData){
                    $newActor = $this->saveNewActor($actorData);
//                    $newActorsArray = $newActor->id;
                    array_push($newActorsArray,$newActor->id);

                    //dd($newActorsArray);
                }
            } else{
                array_push($newActorsArray,$actorId);
            }
        }

        // dd($newActorsArray);

        return $newActorsArray;

    }

    /**
     * @param $fullName
     * @return array actorName and actorLastName
     *
     */
    private function checkNewActorName($fullName)
    {

        $actorData = [];

        $actorFullName = explode(' ', $fullName);

        $actorData['actorName'] = $actorFullName[0];
        $actorData['actorLastName'] = '';

        if( count($actorFullName) > 2){
            for($i = 1; $i <= count($actorFullName)-1; $i++ ){
                $actorData['actorLastName'] .= $actorFullName[$i] . ' ';
            }
        } elseif(count($actorFullName) == 1) {
            $actorData['actorLastName'] = '';
        } else {
            $actorData['actorLastName'] = $actorFullName[1];
        }

        return $actorData;
    }

    /**
     * @param $actorData
     * @return mixed
     */
    private function saveNewActor($actorData)
    {
        return $saved = Actor::firstOrCreate([
            'name' => $actorData['actorName'],
            'lastname' => $actorData['actorLastName']
        ] );

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
