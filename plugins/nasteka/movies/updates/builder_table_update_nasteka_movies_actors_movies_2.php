<?php namespace Nasteka\Movies\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateNastekaMoviesActorsMovies2 extends Migration
{
    public function up()
    {
        Schema::table('nasteka_movies_actors_movies', function($table)
        {
            $table->integer('actor_id')->unsigned()->change();
            $table->integer('movie_id')->unsigned()->change();
            $table->primary(['actor_id','movie_id']);
        });
    }
    
    public function down()
    {
        Schema::table('nasteka_movies_actors_movies', function($table)
        {
            $table->dropPrimary(['actor_id','movie_id']);
            $table->integer('actor_id')->unsigned(false)->change();
            $table->integer('movie_id')->unsigned(false)->change();
        });
    }
}
