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
            $table->string('fullname')->nullable();;
            $table->string('account')->nullable();
            $table->integer('previous_id')->nullable();;
            $table->integer('newbu_id')->nullable();;
            $table->integer('technology_id')->nullable();;
            $table->integer('job_range_id')->nullable();;
            $table->string('language')->nullable();;
            $table->date('ob_day')->nullable();;
            $table->date('transfer_day')->nullable();;
            $table->integer('source_id')->nullable();;
            $table->integer('status_id')->nullable();;
            $table->string('forecast_customer_code')->nullable();;
            $table->integer('forecast_bu_id')->nullable();;
            $table->longText('note')->nullable();;
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
