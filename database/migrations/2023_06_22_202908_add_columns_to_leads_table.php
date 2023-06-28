<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('leads', function (Blueprint $table) {
            $table->string("job_title")->nullable();
            $table->string("department")->nullable();
            $table->integer("account_id")->nullable();
            $table->string("status")->nullable();
            $table->string("source")->nullable();
            $table->string("source_description")->nullable();
            $table->string("referred_by")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('leads', function (Blueprint $table) {
            $table->dropColumn("job_title");
            $table->dropColumn("department");
            $table->dropColumn("account_id");
            $table->dropColumn("status");
            $table->dropColumn("source");
            $table->dropColumn("source_description");
            $table->dropColumn("referred_by");
        });
    }
}
