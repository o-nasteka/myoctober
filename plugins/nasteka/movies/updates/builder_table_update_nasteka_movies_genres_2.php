<?php namespace Nasteka\Movies\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateNastekaMoviesGenres2 extends Migration
{
    public function up()
    {
        Schema::table('nasteka_movies_genres', function($table)
        {
            $table->string('genre_title');
            $table->dropColumn(' genre_title');
        });
    }
    
    public function down()
    {
        Schema::table('nasteka_movies_genres', function($table)
        {
            $table->dropColumn('genre_title');
            $table->string(' genre_title', 191);
        });
    }
}
