<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToOpportunitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('opportunities', function (Blueprint $table) {
            $table->string("stage")->nullable();
            $table->integer("probability")->nullable();
            $table->string("next_step")->nullable();
            $table->string("assigned_to")->nullable();
            $table->string("expected_close")->nullable();
            $table->string("actual_close")->nullable();
            $table->string("type")->nullable();
            $table->string("source")->nullable();
            $table->string("campaign")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('opportunities', function (Blueprint $table) {
            $table->dropColumn("stage");
            $table->dropColumn("probability");
            $table->dropColumn("next_step");
            $table->dropColumn("assigned_to");
            $table->dropColumn("expected_close");
            $table->dropColumn("actual_close");
            $table->dropColumn("type");
            $table->dropColumn("source");
            $table->dropColumn("campaign");
        });
    }
}
