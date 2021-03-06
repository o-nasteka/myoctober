<?php namespace Nasteka\Movies\Models;

use Model;

/**
 * Model
 */
class Movie extends Model
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
    public $table = 'nasteka_movies_';

    /**
     * @var array $jsonable field
     */
    // need for actors repeater field old
    // protected $jsonable = ['actors'];

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    /**
     * Relations
     */
    public $attachOne = [
        'poster' => 'System\Models\File'
    ];

    public $attachMany = [
        'movie_gallery' => 'System\Models\File'
    ];

    public $belongsToMany = [
        'genres' => [
            'Nasteka\Movies\Models\Genre',
            'table' => 'nasteka_movies_movies_genres',
            'order' => 'genre_title'
        ],
        'actors' => [
            'Nasteka\Movies\Models\Actor',
            'table' => 'nasteka_movies_actors_movies',
            'order' => 'name'
        ]
    ];
}
