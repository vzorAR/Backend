<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEndUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('end_users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->enum('sex', ['male', 'female']);
            $table->integer('age');
            $table->unsignedBigInteger('city_id');
            $table->foreign('city_id')
                ->on('cities')
                ->references('id')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('phone');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('end_users');
    }
}
