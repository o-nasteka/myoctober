<?php namespace Nasteka\Profile\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class AddNewFields extends Migration
{

    public function up()
    {
        Schema::table('users', function($table)
        {

            $table->string('facebook')->nullable();
            $table->text('biography')->nullable();
        });
    }

    public function down()
    {

        Schema::table('users', function ($table) {
            $table->dropColumn(['facebook', 'biography']);
        });

    }

}