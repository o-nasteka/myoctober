<?php namespace Nasteka\Movies\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateNastekaMoviesActors extends Migration
{
    public function up()
    {
        Schema::table('nasteka_movies_actors', function($table)
        {
            $table->integer('custom_sort_order_column');
        });
    }
    
    public function down()
    {
        Schema::table('nasteka_movies_actors', function($table)
        {
            $table->dropColumn('custom_sort_order_column');
        });
    }
}
