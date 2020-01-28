<?php

namespace Nasteka\Movies\Components;

use Cms\Classes\ComponentBase;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
use Nasteka\Movies\Models\Actor;
use October\Rain\Support\Facades\Flash;


/**
 * Class ActorForm
 * @package Nasteka\Movies\Components
 */
class ActorForm extends ComponentBase
{
    /**
     * @return array
     */
    public function componentDetails()
    {
        return [
            'name' => 'Actor form',
            'description' => 'Enter Actors'
        ];
    }


    /**
     * Contact Components use this onSaveActors
     */
    public function onSaveActors()
    {
        $name = Input::get('name');
        $lastname = Input::get('lastname');

        $message =

        $validator = Validator::make(
            [
                'name' => $name,
                'lastname' => $lastname
            ],
            [
                'name' => 'required|min:2',
                'lastname' => 'required|min:2'
            ]
        );

        if ( $validator->fails() ) {
            return Redirect::back()
                ->withInput()
                ->withErrors($validator);
        } else {
            // Save actors
            $actor = Actor::firstOrCreate([
                'name' => $name,
                'lastname' => $lastname
            ]);
            if($actor->wasRecentlyCreated){
                Flash::success(post('flash', trans('New actor is saved.')));
                return redirect()->back();
            } else {
                return Redirect::back()
                    ->withInput()
                    ->withErrors(trans('New actor isn\'t saved! Already exist in database.'));

//                Flash::error(post('flash', trans('New actor isn\'t saved!')));
//                return redirect()->back();
            }
        }
    }
}
