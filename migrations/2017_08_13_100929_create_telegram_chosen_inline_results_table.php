<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTelegramChosenInlineResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('telegram_chosen_inline_result', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_520_ci';
            $table->bigInteger('id');
            $table->string('result_id', 255)->default('');
            $table->bigInteger('user_id')->nullable();
            $table->string('location', 255)->nullable();
            $table->string('inline_message_id', 255)->nullable();
            $table->text('query');
            $table->timestamps();

            $table->primary('id');
            $table->index('user_id');
        });

        Schema::table('telegram_chosen_inline_result', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('telegram_user');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('telegram_chosen_inline_result');
    }
}