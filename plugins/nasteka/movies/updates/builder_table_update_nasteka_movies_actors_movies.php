<?php namespace Nasteka\Movies\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateNastekaMoviesActorsMovies extends Migration
{
    public function up()
    {
        Schema::table('nasteka_movies_actors_movies', function($table)
        {
            $table->renameColumn('movies_id', 'movie_id');
        });
    }
    
    public function down()
    {
        Schema::table('nasteka_movies_actors_movies', function($table)
        {
            $table->renameColumn('movie_id', 'movies_id');
        });
    }
}
