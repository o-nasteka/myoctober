<?php namespace Nasteka\Movies\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateNastekaMoviesActorsMovies extends Migration
{
    public function up()
    {
        Schema::create('nasteka_movies_actors_movies', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('actor_id');
            $table->integer('movies_id');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('nasteka_movies_actors_movies');
    }
}
