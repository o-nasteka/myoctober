<?php namespace Nasteka\Movies\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateNastekaMoviesActors extends Migration
{
    public function up()
    {
        Schema::create('nasteka_movies_actors', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('name')->nullable();
            $table->string('lastname')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('nasteka_movies_actors');
    }
}
