<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('accounts', function (Blueprint $table) {
            $table->string("website");
            $table->string("type");
            $table->string("member_of")->nullable();
            $table->string("campaign")->nullable();
            $table->string("industry")->nullable();
            $table->string("employees")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('accounts', function (Blueprint $table) {
            $table->dropColumn('website');
            $table->dropColumn('type');
            $table->dropColumn('member_of');
            $table->dropColumn('campaign');
            $table->dropColumn('industry');
            $table->dropColumn('employees');
        });
    }
}
