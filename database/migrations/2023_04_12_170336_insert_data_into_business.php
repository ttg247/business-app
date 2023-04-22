<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class InsertDataIntoBusiness extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('business')->insert(
            [
                "name" => 'Terra Sunny',
                "summary" => "An innovative approach to traditional buying and selling",
                "details" => "Lorem ipsum",
                "email" => "email@yahoo.com",
                "phone" => "23455",
                "facebook" => "facebook.com/terrasunny",
                "twitter" => "twitter.com/terrasunny",
                "instagram" => "instagram.com/terrasunny",
                "users_id" => "1",
                "created_at" => now(),
                "updated_at" => now(),
            ]
        );        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('customers')->truncate();
    }
}
