<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PagesTableTranslatable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pages', function ($table) {
            $table->string('translation_lang', 10)->nullable()->default('en')->after('extras');
            $table->integer('translation_of')->unsigned()->nullable()->after('translation_lang');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pages', function ($table) {
            $table->dropColumn('translation_lang');
            $table->dropColumn('translation_of');
        });
    }
}
