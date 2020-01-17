<?php namespace Nasteka\Movies\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateNastekaMoviesGenres extends Migration
{
    public function up()
    {
        Schema::table('nasteka_movies_genres', function($table)
        {
            $table->increments('id')->unsigned(false)->change();
        });
    }
    
    public function down()
    {
        Schema::table('nasteka_movies_genres', function($table)
        {
            $table->increments('id')->unsigned()->change();
        });
    }
}
