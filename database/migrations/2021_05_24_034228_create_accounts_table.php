<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->string('account');
            $table->integer('previous');
            $table->integer('newbu');
            $table->integer('technology');
            $table->integer('job_range');
            $table->string('language');
            $table->date('ob_day');
            $table->date('transfer_day');
            $table->integer('source');
            $table->integer('status');
            $table->string('forecast_customer_code');
            $table->integer('forecast_bu');
            $table->string('note');
            $table->softDeletes ();
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
        Schema::dropIfExists('accounts');
    }
}
