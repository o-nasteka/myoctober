<?php namespace Nasteka\Movies\Models;

use Model;

/**
 * Model
 */
class Actor extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /*
     * Disable timestamps by default.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = false;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'nasteka_movies_actors';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    /**
     * Relations
     */

    public $belongsToMany = [
        'movies' => [
            'Nasteka\Movies\Models\Movie',
            'table' => 'nasteka_movies_actors_movies',
            'order' => 'name'
        ]
    ];

    /**
     * Accessors
     */

    /**
     * @return string
     */
    public function getFullNameAttribute()
    {
        return $this->name . " " . $this->lastname;
    }
}
