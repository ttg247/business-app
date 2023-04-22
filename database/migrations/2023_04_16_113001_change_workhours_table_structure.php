<?php 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeWorkhoursTableStructure extends Migration
{
    public function up()
    {
        Schema::table('workhours', function (Blueprint $table) {
            $table->dropColumn(['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday']);
            $table->time('monday_start_time')->nullable();
            $table->time('monday_end_time')->nullable();
            $table->time('tuesday_start_time')->nullable();
            $table->time('tuesday_end_time')->nullable();
            $table->time('wednesday_start_time')->nullable();
            $table->time('wednesday_end_time')->nullable();
            $table->time('thursday_start_time')->nullable();
            $table->time('thursday_end_time')->nullable();
            $table->time('friday_start_time')->nullable();
            $table->time('friday_end_time')->nullable();
            $table->time('saturday_start_time')->nullable();
            $table->time('saturday_end_time')->nullable();
            $table->time('sunday_start_time')->nullable();
            $table->time('sunday_end_time')->nullable();
        });
    }

    public function down()
    {
        Schema::table('workhours', function (Blueprint $table) {
            $table->dropColumn(['monday_start_time', 'monday_end_time', 'tuesday_start_time', 'tuesday_end_time', 'wednesday_start_time', 'wednesday_end_time', 'thursday_start_time', 'thursday_end_time', 'friday_start_time', 'friday_end_time', 'saturday_start_time', 'saturday_end_time', 'sunday_start_time', 'sunday_end_time']);
            $table->integer('monday');
            $table->integer('tuesday');
            $table->integer('wednesday');
            $table->integer('thursday');
            $table->integer('friday');
            $table->integer('saturday');
            $table->integer('sunday');
        });
    }
}
