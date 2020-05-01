<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToContactFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contact_forms', function (Blueprint $table) {
            $table->boolean('multiple_staff')->default(false);
            $table->boolean('multiple_courses')->default(false);
            $table->boolean('individual_courses')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contact_forms', function (Blueprint $table) {
            $table->dropColumn('multiple_staff');
            $table->dropColumn('multiple_courses');
            $table->dropColumn('individual_courses');
        });
    }
}
