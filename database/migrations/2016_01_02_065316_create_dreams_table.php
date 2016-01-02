<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDreamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dreams', function(Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->text('content');
            $table->integer('user_id')->unsigned();
        });

        Schema::table('dreams', function(Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')
                    ->onDelete('restrict')
                    ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dreams', function(Blueprint $table) {
            $table->dropForeign('dreams_user_id_foreign');
        });

        Schema::drop('dreams');
    }
}
