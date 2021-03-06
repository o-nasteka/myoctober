<?php namespace Nasteka\Movies\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateNastekaMovies2 extends Migration
{
    public function up()
    {
        Schema::table('nasteka_movies_', function($table)
        {
            $table->text('actors')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('nasteka_movies_', function($table)
        {
            $table->dropColumn('actors');
        });
    }
}
