<?php namespace Nasteka\Movies\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateNastekaMoviesGenres extends Migration
{
    public function up()
    {
        Schema::create('nasteka_movies_genres', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string(' genre_title');
            $table->string('slug');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('nasteka_movies_genres');
    }
}
