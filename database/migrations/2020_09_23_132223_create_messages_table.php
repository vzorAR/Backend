<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('end_user_id');
            $table->foreign('end_user_id')
                ->on('end_users')
                ->references('id')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('title', 100);
            $table->text('description');
            $table->tinyInteger('read')->default(false);
            $table->dateTime('read_date')->nullable();
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
        Schema::dropIfExists('messages');
    }
}
