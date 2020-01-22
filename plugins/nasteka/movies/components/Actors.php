<?php

namespace Nasteka\Movies\Components;

use Cms\Classes\ComponentBase;
use Nasteka\Movies\Models\Actor;

/**
 * Class Actors
 * @package Nasteka\Movies\Components
 */
class Actors extends ComponentBase
{
    /**
     * @var
     */
    public $actors;

    /**
     * @return array
     */
    public function componentDetails()
    {
        return [
            'name' => 'Actor list',
            'description' => 'List of actors'
        ];
    }

    public function defineProperties()
    {
        return [
          'results' => [
              'title' => 'Number of Actors',
              'description' => 'How many actors do you want to display',
              'default' => 0,
              'validationPattern' => '^[0-9]+$',
              'validationMessage' => 'Only numbers allowed'
          ],
            'sortOrder' => [
                'title' => 'Sort Actors',
                'description' => 'Sort those Actors',
                'type' => 'dropdown',
                'default' => 'name ASC'
            ]
        ];
    }

    /**
     * Run
     */
    public function onRun()
    {
        $this->actors = $this->loadActors();
    }

    public function getSortOrderOptions()
    {
        return [
            'name ASC' => 'Name (ascending)',
            'name DESC' => 'Name descending'
        ];
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|Actor[]
     */
    protected function loadActors()
    {
        $query = Actor::all();

        // Sort Order Actor property
        if( $this->property('sortOrder') == 'name ASC' ){
            $query = $query->sortBy('name');
        }

        if( $this->property('sortOrder') == 'name DESC' ){
            $query = $query->sortByDesc('name');
        }


        // change Actors results take from property 'Number of Actors'
        if( $this->property('results') > 0 ) {
            $query = $query->take($this->property('results'));
        }


        return $query;
    }
}
