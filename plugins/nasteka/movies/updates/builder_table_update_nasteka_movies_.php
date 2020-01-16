<?php namespace Nasteka\Movies\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateNastekaMovies extends Migration
{
    public function up()
    {
        Schema::table('nasteka_movies_', function($table)
        {
            $table->string('slug', 100)->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('nasteka_movies_', function($table)
        {
            $table->dropColumn('slug');
        });
    }
}
